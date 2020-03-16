<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => encrypt('admin'),
            'email' => 'admin'.'@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => encrypt('Deadline Manager'),
            'email' => 'deadline'.'@gmail.com',
            'password' => bcrypt('deadline'),
            'role' => 2,
        ]);
    }
}
