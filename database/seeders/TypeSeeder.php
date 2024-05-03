<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // dos tipos de usuarios: Owner y Veterinary

        $userTypes = [
            ['user_type' => 'Owner'],
            ['user_type' => 'Veterinary'],
        ];

        foreach ($userTypes as $type) {
            Type::create($type);
            // si no importase la clase Type se puede escribir asi: \App\Models\Type::create($type);

            /* Otra manera de recorrer este bucle foreach:
                
                    foreach ($userTypes as $userType) {
                        $type = new Type;
                        $type->type = $userType['type'];
                        $type->save();
                    }
            */
        }
    }
}
