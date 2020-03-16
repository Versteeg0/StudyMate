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
            'first_name' => 'Stefan',
            'prefix' => 'van',
            'last_name' => 'Dockum',
        ]);

        DB::table('teachers')->insert([
            'first_name' => 'Jasper',
            'prefix' => 'van',
            'last_name' => 'Rosmalen',
        ]);

        DB::table('teachers')->insert([
            'first_name' => 'Stijn',
            'last_name' => 'Smulders',
        ]);

        DB::table('teachers')->insert([
            'first_name' => 'Bob',
            'last_name' => 'Polis',
        ]);
    }
}
