<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prixAchat',
        'prixVenteDetails',
        'prixVenteEngros',
        'quantite',
        'id_categorie',
    ];
    protected $table = 'produits';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function images()
    {
        return $this->hasMany(ProduitImage::class, 'id_produit', 'id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie', 'id');
    }
    public function venteProduits()
    {
        return $this->hasMany(VenteProduit::class, 'id_produit', 'id');
    }
}
