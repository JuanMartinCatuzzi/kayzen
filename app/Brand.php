<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function modelo (){
      return $this->hasMany(Modelo::class, 'brand_id');
    }
}
