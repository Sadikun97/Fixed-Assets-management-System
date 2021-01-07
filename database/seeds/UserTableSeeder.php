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
            'password'=>bcrypt('12345')
        ]);

        User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('12345'),
            'contact'=>'011312313'
        ]);
    }
    
}
