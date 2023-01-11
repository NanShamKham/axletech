<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09483823883',
            'role' => 'User',
            'image' => "hello"
        ]);
        // \App\Models\Project::factory(50)->create();
        // \App\Models\Category::factory(9)->create();
        // \App\Models\City::factory(12)->create();
        // \App\Models\Town::factory(30)->create();
    }
}
