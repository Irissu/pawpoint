<?php

namespace App\Utils;

use Faker\Factory as FakerFactory;

class Functions {

    public static function createUserfromGOT($person) {
         return new class($person) {
            public $id;
            public $name;
            public $lastname;
            public $email;
            public $email_verified_at;
            public $password;
            public $type_id;

            public function __construct($person) {
                $faker = FakerFactory::create();
                $this->id =  $faker->unique()->numberBetween(10000000, 99999999) . strtoupper( $faker->randomLetter);
                $this->name = $person['name'];
                $this->lastname = $person['slug'];
                $this->email = $person['name'] . '@' . ['slug'] . '.com';
                $this->email_verified_at = now();
                $this->password = 123456789;
            }

         };
    }
}
?>


