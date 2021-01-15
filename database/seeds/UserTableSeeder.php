<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'contact'=>'011312313',
            'user_type'=>'admin',
            'password'=>bcrypt('12345')
        ]);

        User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'user_type'=>'admin',
            'contact'=>'0113123134',
            'password'=>bcrypt('123456')
           
        ]);
    }
    
}
