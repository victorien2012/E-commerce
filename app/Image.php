<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['lien', 'produit_id'];
    //
    public function product()
    {

        return $this->belongsTo(Produits::class);
    }


    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

}
