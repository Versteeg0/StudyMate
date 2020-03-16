<?php

use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'first_name' => encrypt('Stefan'),
            'prefix' => encrypt('van'),
            'last_name' => encrypt('Dockum'),
        ]);

        DB::table('teachers')->insert([
            'first_name' => encrypt('Jasper'),
            'prefix' => encrypt('van'),
            'last_name' => encrypt('Rosmalen'),
        ]);

        DB::table('teachers')->insert([
            'first_name' => encrypt('Stijn'),
            'last_name' => encrypt('Smulders'),
        ]);

        DB::table('teachers')->insert([
            'first_name' => encrypt('Bob'),
            'last_name' => encrypt('Polis'),
        ]);
    }
}
