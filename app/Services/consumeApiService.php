<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
/* use App\Models\consumeApiService; */

class consumeApiService
{

    public function consumeApi($url)
    {
        $response = Http::get($url);
        $data = $response->json();

        return $data;
    }
}
