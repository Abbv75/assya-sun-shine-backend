<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
    ];
    protected $table = 'categories';
    
    public function produits()
    {
        return $this->hasMany(Categorie::class, 'id_categorie', 'id');
    }
}
