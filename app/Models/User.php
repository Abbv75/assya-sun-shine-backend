<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomComplet',
        'login',
        'password',
        'id_role',
        'id_contact',
    ];
    protected $table = 'users';
    protected $hidden = [
        'password',
    ];
    protected $primaryKey = 'id';
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'id_contact');
    }
}
