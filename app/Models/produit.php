<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $table = 'produit';
    protected $fillable = [
        'nom', 'prix', 'description', 'quantité', 'categorie_id', 'image'
    ];

    public function cate()
    {
        return $this->belongsTo(categorie::class, 'categorie_id');
    }
}

