<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Residencia extends Model
{
	use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $table = 'residencias';
	protected $primaryKey = 'id';
	// public $timestamps = false;
	// protected $guarded = ['id'];
	protected $fillable = ['nombre','ciudad_id','barrio_id','tipo','direccion','latitud','longitud','descripcion','disponibilidad','precio','tipo_venta','url_video','metraje','baños','habitaciones','garaje','otros','visible','activo','destacado'];
	// protected $hidden = [];
    // protected $dates = [];
     protected $casts = [
        // 'fotos' => 'array'
    ];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function  ciudad(){
		return $this->belongsTo("\App\Models\Ciudad");
	}
	public function  barrio(){
		return $this->belongsTo("\App\Models\Barrio");
	}

	public function images(){
		return $this->hasMany("\App\Models\Image");
	}
	public function Image(){
		return $this->belongsTo("\App\Models\Image","default_photo","id");
	}
	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/
	public function scopeDestacados($q){
		return $q->where("destacado","=","1");
	}
	public function fotoButton(){
		return '<a href="'. url('/admin/residencia/'. $this->id .'/fotos').'"class="btn btn-xs btn-default"><i class="fa fa-picture-o"></i> Fotos</a>';
	}
	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/
	public function setPhotosAttribute($value)
	    {
	        $attribute_name = "fotos";
	        $disk = "uploads";
	        $destination_path = public_path("img/residencias/". $this->id);

	        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
	    }



	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
