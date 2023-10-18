<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create(['name' => 'Paolo', 'lastname' => 'Cardinale', 'email' => 'paolo@gmail.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Carmelo', 'lastname' => 'Leone', 'email' => 'carmelo@gmail.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Roberto', 'lastname' => 'Nesta', 'email' => 'roberto@gmail.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Giovanni Maria', 'lastname' => 'Ciclosi', 'email' => 'giovanni@gmail.com', 'password' => Hash::make('password'),]);
        User::create(['name' => 'Mattia', 'lastname' => 'Benelli', 'email' => 'mattia@gmail.com', 'password' => Hash::make('password'),]);
  
    }
}
