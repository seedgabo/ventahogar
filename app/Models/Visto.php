<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visto extends Model
{
    
    protected $table = 'vistos';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['residencia_id', 'user_id'];
}
