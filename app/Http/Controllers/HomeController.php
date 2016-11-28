<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

   public function welcome(Request $request){
     $destacadas = \App\Models\Residencia::destacados()->get();
     $residencias = \App\Models\Residencia::inRandomOrder()->paginate(6);
     return view("welcome")
     ->withDestacadas($destacadas)
     ->withResidencias($residencias);
   }

   public function contact (Request $request){
    return view("contact");
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

  public function login(Request $request){
      
      if(\App\User::where("email",$request->input('email'))->count() == 0)
      {
          $user = \App\User::Create($request->only('email','name'));
          $password = rand(10000,1000000);
          $user->password($password);
          // TODO: Send mail to Client
          // TODO: Send Mail To Admin
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password', $password)]);
      }
      else
      {
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
      }
      return redirect('/');
  }

  public function logout(Request $request){
    Auth::logout();
    return back();
  }
}
