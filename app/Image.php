<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['nom', 'produit_id'];
    //
    public function product()
    {

        return $this->belongsTo(Produits::class);
    }
}
