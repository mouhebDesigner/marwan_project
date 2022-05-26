<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "nom" => "admin",
                "prenom" => "admin",
                "email" => "admin@gmail.com",
                "numtel" => "12345678",
                "cin" => "13241671",
                "date_naissance" => "1999-10-15",
                "role" => "admin",
                "password" => Hash::make("adminadmin"),
            ]
        ]);
        DB::table('users')->insert([
            [
                "nom" => "Marwan",
                "prenom" => "Azaiz",
                "email" => "marwanazaiz21@gmail.com",
                "cin" => "13344455",
                "numtel" => "27668244",
                "date_naissance" => "1999-07-18",
                "formation" => "BTP 1 informatique de gestion",
                "adresse" => "Mareth",
                "role" => "eleve",
                "password" => Hash::make("adminadmin"),
            ]
        ]);
        DB::table('users')->insert([
            [
                "nom" => "Mounir",
                "prenom" => "Ayachi",
                "email" => "mounir.ayachi@gmail.com",
                "cin" => "1522335",
                "numtel" => "55246825",
                "date_naissance" => "1980-04-15",
                "specialite" => "Plomberie",
                "adresse" => "Mareth",
                "role" => "formateur",
                "password" => Hash::make("adminadmin"),
            ]
        ]);
    }
}
