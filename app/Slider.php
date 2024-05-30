<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //

    protected $fillable = ['description1', 'description2', 'slider_image', 'statut'];

//    public function slider()
//    {
//        return $this->hasMany(Slider::class);
//    }
}
