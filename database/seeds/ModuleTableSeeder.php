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
    {
        DB::table('modules')->insert([
            'module_name' => 'PHP',
            'module_description' => 'Websites bouwen met laravel en PHP',
            'coordinator' => 1,
            'module_category' => 'Programmeren 1',
            'module_period' => '1',
            'module_block' => '2',
            'teacher_id' => '1',
        ]);

        DB::table('modules')->insert([
            'module_name' => 'JS',
            'module_description' => 'Magazijn manager bouwen met Javascript',
            'coordinator' => 1,
            'module_category' => 'Programmeren 1',
            'module_period' => '2',
            'module_block' => '4',
            'teacher_id' => '1',
        ]);

        DB::table('modules')->insert([
            'module_name' => 'REGEX',
            'module_description' => 'Leren hoe je een eigen regex bouwt.',
            'coordinator' => 1,
            'module_category' => 'Programmeren 1',
            'module_period' => '3',
            'module_block' => '2',
            'teacher_id' => '1',
        ]);

        DB::table('assignments')->insert([
            'name' => 'PHP-Assessment',
            'module_id' => 1,
            'ec' => 4,
        ]);

        DB::table('assignments')->insert([
            'name' => 'JS-Assessment',
            'module_id' => 2,
            'ec' => 4,
        ]);

        DB::table('assignments')->insert([
            'name' => 'REGEX-Tentamen',
            'module_id' => 3,
            'ec' => 4,
        ]);

    }
}
