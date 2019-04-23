<?php

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
        App\User::create([
        	'name' => 'Admin',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('rahasia'),
        	'roles' => json_encode(['Admin']),
        	'phone' => '08571687247',
        	'address' => 'Bogor'
        	]);

        App\User::create([
        	'name' => 'Customer',
        	'email' => 'customer@gmail.com',
        	'password' => Hash::make('rahasia'),
        	'roles' => json_encode(['Customer']),
        	'phone' => '08571687247',
        	'address' => 'Bogor'
        	]);
    }
}
