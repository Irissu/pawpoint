<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'breed',
        'weight',
        'type',
        'age',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

        // uno a uno polimorfica
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
