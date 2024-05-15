<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'prix', 'categorie_id', 'image_id', 'statut'];

    public function image()
    {
        return $this->hasMany(Image::class);
    }

}
