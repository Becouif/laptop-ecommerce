<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'email_verified_at'=>NOW(),
            'address'=>'ukraine',
            'phone_number'=>'0731185943',
            'is_admin'=>1


        ]);
    }
}
