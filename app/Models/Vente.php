<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'id_boutique',
        'id_client',
    ];
    protected $table = 'ventes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'vente_produits', 'id_vente', 'id_produit');
    }
}
