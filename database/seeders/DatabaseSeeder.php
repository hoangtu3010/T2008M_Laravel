<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            ProductSeeder::class,
//            CategorySeeder::class,
//            BrandSeeder::class
//        ]);
        DB::table("admins")->insert([
            "name"=>"SiegFried",
            "email"=>"sf@gmail.com",
            "role"=>"SF",
            "password"=>bcrypt("12345678")
        ]);


    }
}
