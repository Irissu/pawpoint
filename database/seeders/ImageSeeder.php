<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pet;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Hay que ejecutar un php artisan storage:link si usamos el Facade de Storage
     */
    public function run(): void
    {
        $users = User::all();
        $pets = Pet::all();

        foreach ($users as $user) {
            $url = "https://source.unsplash.com/random/64x64";
            /* $url2 = "https://randomuser.me/api/"; */
            $contents = Http::get($url)->body();
            $name = $user->id.'.jpg'; // nombre aleatorio de usuario (10 caracteres)
            /* Cambia la ruta de almacenamiento a public/assets:
             Storage::disk('public')->put('assets/'.$name, $contents); */
            Storage::disk('public')->put($name, $contents);
            
            $user->image()->create([
                'url' => Storage::url($name), 
                'imageable_id' => $user->id,
                'imageable_type' => User::class
            ]);
        }
       
        foreach ($pets as $pet) {
            $url = "https://source.unsplash.com/random/64x64";
            $contents = Http::get($url)->body();
            $name = $pet->id.'.jpg'; 
            Storage::disk('public')->put($name, $contents);
            
            $pet->image()->create([
                'url' => Storage::url($name),
                'imageable_id' => $pet->id,
                'imageable_type' => Pet::class
            ]);
        }


    }
}
