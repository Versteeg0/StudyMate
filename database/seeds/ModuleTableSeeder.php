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
    {        DB::table('modules')->insert([
        'module_name' => 'PHP',
        'module_description' => 'Websites bouwen met laravel en PHP',
        'coordinator' => 10,
        'is_my_teacher' => 10,
        'module_category' => 'Programmeren',
        'module_period' => 'Periode 4',
        'module_ec' => 4
    ]);
    }
}
