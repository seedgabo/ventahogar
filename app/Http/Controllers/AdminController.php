<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}

	public function editarFotos(Request $request, $id){
		$residencia  = \App\Models\Residencia::find($id);
		$fotos = $residencia->images;

		return view("admin.editFotos")->withResidencia($residencia)->withFotos($fotos);
	}

	public function uploadPhoto(Request $request, $id){
		$residencia  = \App\Models\Residencia::findorFail($id);
		$foto = $request->photo;
		$image = Image::create(["residencia_id" => $id, 'titulo' => $foto->getClientOriginalName()]);
		$image->url = url('img/residencias/' . $image->id . "." . $foto->extension());
		$image->save();
		$foto->move(public_path("img/residencias/"), $image->id . "." . $foto->extension());
		return response()->json(["url" => $image->url, 'id' => $image->id]);
	}

	public function defaultPhoto(Request $request, $residencia_id, $image_id){
		$residencia  = \App\Models\Residencia::findorFail($residencia_id);
		$residencia->default_photo =  $image_id;
		$residencia->save();
		return back();		
	}
}
