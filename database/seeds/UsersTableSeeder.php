<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'avilawilson@sag.gob.hn',
                'phone'          => '9629-5769',
                'password'       => '$2a$12$P0ZgOqSB6MfS6Zc4FI.0EOcR7WpM2Qiim/o/2IzkuShoRAZDV5cd2',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Sarony Godoy',
                'email'          => 'sarony.godoy@sag.gob.hn',
                'phone'          => '9999-9999',
                'password'       => '$2y$10$gJ0VcFJEmv5C1byaInJk9.CKHgzRqpVntu9Z/9bcTWZNxBazcQf1u',
                'remember_token' => null,
                //Godoy.123.
            ],
            [
                'id'             => 3,
                'name'           => 'Walter Vivas',
                'email'          => 'walter.vivas@sag.gob.hn',
                'phone'          => '9595-8598',
                'password'       => '$2y$10$xBGMccdRAyZLiy80e91NbeW43kxWDS/PvcBcipKHs7eUm97j0n7eK',
                'remember_token' => null,
                //viVas321.
            ],
            [
                'id'             => 4,
                'name'           => 'Mauricio Pineda',
                'email'          => 'mauricio.pineda@sag.gob.hn',
                'phone'          => '9696-9993',
                'password'       => '$2y$10$uCjnRT/oCe8.CNw24jReWuMDe9DvI5ktE7GyWnUlxjonlZvCIV5xm',
                'remember_token' => null,
                //PinedA987.
            ],
            [
                'id'             => 5,
                'name'           => 'Yolanda Rodas',
                'email'          => 'yolanda.rodas@sag.gob.hn',
                'phone'          => '9893-9889',
                'password'       => '$2y$10$PUc9qEuP7mwm4iwAzPiKQ.ZytZDI78nZiG1.fytPIzA0ZBPtcSAKm',
                'remember_token' => null,
                //RodaS123.
            ],
            [
                'id'             => 6,
                'name'           => 'Gladis Avila',
                'email'          => 'gladis.avila@sag.gob.hn',
                'phone'          => '9398-0944',
                'password'       => '$2y$10$fI7NwNrWxKawqkMIuqYKmO/Du1wgd/VI6JW9sY/cMOvoejlsYLPXy',
                'remember_token' => null,
                //Gladis654.
            ],

        ];

        User::insert($users);
    }
}
