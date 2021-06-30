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
            "name"=>"Adminstractor",
            "email"=>"admin@gmail.com",
            "role"=>"ADMIN",
            "password"=>bcrypt("12345678")
        ]);

        DB::table("users")->insert([
            "name"=>"User",
            "email"=>"user@gmail.com",
            "password"=>bcrypt("12345678")
        ]);
    }
}
