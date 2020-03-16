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
        'module_ec' => 4,
        'isChecked' => '0',
            'teacher_id' => '1',

        ]);

        DB::table('modules')->insert([
            'module_name' => 'JS',
            'module_description' => 'Magazijn manager bouwen met Javascript',
            'coordinator' => 1,
            'module_category' => 'Programmeren 1',
            'module_period' => '2',
            'module_ec' => 4,
            'isChecked' => '0',
            'teacher_id' => '1',
        ]);

        DB::table('modules')->insert([
        'module_name' => 'REGEX',
        'module_description' => 'Leren hoe je een eigen regex bouwt.',
            'coordinator' => 1,
            'module_category' => 'Programmeren 1',
            'module_period' => '3',
            'module_ec' => 4,
            'isChecked' => '0',
            'teacher_id' => '1',
        ]);

        DB::table('assignments')->insert([
            'module_id' => 1,
        ]);

        DB::table('assignments')->insert([
            'module_id' => 2,
        ]);

        DB::table('assignments')->insert([
            'module_id' => 3,
        ]);

    }
}
