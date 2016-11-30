<?php

namespace App\Http\Controllers;

use App\Mail\NewAccount;
use App\Notifications\RegisteredContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

  public function welcome(Request $request){
     $destacadas = \App\Models\Residencia::destacados()->get();
     $residencias = \App\Models\Residencia::inRandomOrder()->paginate(6);
     return view("welcome")->withDestacadas($destacadas)->withResidencias($residencias);
  }

  public function contact(Request $request, $residencia_id = null){
      $residencia = Residencia::find($residencia_id);
      return view("contact")->withResidencia($residencia);
  }

  public function ver(Request $request, $id){
    $residencia = \App\Models\Residencia::find($id);
    $user_id = isset(Auth::user()->id) ? Auth::user()->id : null;
    \App\Models\Visto::create(['residencia_id' => $id, 'user_id' => $user_id]);
    return view("ver-residencia")->withResidencia($residencia);
  }

  public function busqueda(Request $request){
    $search = $request->input("search","");
    $residencias = \App\Models\Residencia::where(function($q) use ($search){
     return $q->orWhere("nombre","LIKE","%". $search ."%")
     ->orWhere("descripcion","LIKE","%". $search ."%");
   });
    if ($request->has("tipo_venta")) {
     $residencias = $residencias->where("tipo_venta",$request->input("tipo_venta"));
       }
       if ($request->has("tipo")) {
         $residencias = $residencias->where("tipo",$request->input("tipo"));
       }
       if ($request->has("ciudad_id")) {
         $residencias = $residencias->where("ciudad_id",$request->input("ciudad_id"));
       }
       if ($request->has("barrio_id")) {
         $residencias = $residencias->where("barrio_id",$request->input("barrio_id"));
       }
       if ($request->has("min_precio")) {
         $residencias = $residencias->where("precio", ">=",$request->input("min_precio"));
       }
       if ($request->has("max_precio")) {
         $residencias = $residencias->where("precio", "<=",$request->input("max_precio"));
       }

       $residencias = $residencias->paginate(12);
       return view('busqueda')->withResidencias($residencias);
  }

  public function register(Request $request){
      if(\App\User::where("email",$request->input('email'))->count() == 0)
      {
          $password = rand(10000,1000000);
          $data = $request->only(['name','email','phone']);
          $data['password'] = $password;
          $user = \App\User::Create($data);
          // TODO: Send mail to Client
          Mail::to($user)->send(new NewAccount($user,$password));
          // TODO: Send Mail To Admin
          $message = $request->input('message');
          // Mail::to(config('app.owner_email'))->send(new RegisteredContact($user,$msg));
          Notification::send(User::where("admin",1)->get(), new RegisteredContact($user ,$msg));

          Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password', $password)]);
          return redirect('/');
      }
      else
      {
          return "Usuario Ya Registrado" ;      
      }
  }

  public function login(Request $request){
      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
      {
        if(Auth::user()->admin == 1)
        {
          return redirect('/admin/dashboard');
        }
        return redirect('/');
      }  
      else{
        return "Usuario o Contrasena invalidos";
      }
  }

  public function logout(Request $request){
    Auth::logout();
    return back();
  }

  public function interes(Request $request){
      if(!Auth::check())
      {
        return redirect('contact?residencia_id='. $request->input('residencia_id'));
      }
      $residencia = \App\Models\Residencia::findorFail($request->input('residencia_id'));
      Notification::send(User::where("admin",1)->get(), new NewWish($user ,$residencia));
      Auth::user()->notfy(new NewWishUser($residencia));
      return redirect('/');
  }

}
