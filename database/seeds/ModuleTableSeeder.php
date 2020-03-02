<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        DB::table('users')->insert([
        'module_name' => 'PHP',
        'module_description' => 'Websites bouwen met laravel en PHP',
        'coordinator' => 'Jasper'
    ]);
    }
}
