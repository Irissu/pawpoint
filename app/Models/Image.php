<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'imageable_id', 'imageable_type'];

    public function imageable() { //con esto indicamos que vamos a usar la tabla images
        return $this->morphTo(); // para realizar una relacion polimorfica
    }
}
