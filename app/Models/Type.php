<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
    ];

    // Relacion muchos a muchos con la tabla users
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
