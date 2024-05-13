<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PetController extends Controller
{

    public function getCatAvatar() {
        $response = Http::get('https://api.thecatapi.com/v1/images/search');
        $petImage = $response->json();
    }
}
