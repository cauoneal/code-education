<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\CodeProject\Entities\User::class)->create([
            'name' => 'Carlos',
            'email' => 'cauoneal@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);        
    }

}
