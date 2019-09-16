<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = ['name', 'description', 'imagen'];

    public function brand(){
      return $this->belongsTo(Brand::class, 'brand_id');
    }
}
