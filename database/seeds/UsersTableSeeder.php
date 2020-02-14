<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
        'name' =>'Enamnuel Alabau',
        'email' => 'ealabau@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('41170669'), // password
        
        'dni' => '41170669',
        'direccion' => 'Jr. Asturias 132',
        'telefono' => '989222345',
        'role' => 'admin'

    ]); 
    	factory(App\User::class,50)->create();


    }
}
