<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nom_categorie'];
    //
    public function product()
    {

        return $this->belongsTo(Produit::class);
    }
}

