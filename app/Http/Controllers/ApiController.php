<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function deleteImage(Request $request ,$id){
    	\App\Models\Image::destroy($id);
    	return back();
    }

    public function GetImage(Request $request,$id){
    	return \App\Models\Image::find($id);
    }
}
