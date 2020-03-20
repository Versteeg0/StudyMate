<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
        'subject_name' => 'PHP',
        'subject_description' => 'Websites bouwen met laravel en PHP',
        'coordinator' => 1,
        'subject_category' => 'Programmeren 1',
        'subject_period' => '1',
        'subject_ec' => 4,
        'isChecked' => '0',
            'teacher_id' => '1',

        ]);

        DB::table('subjects')->insert([
            'subject_name' => 'JS',
            'subject_description' => 'Magazijn manager bouwen met Javascript',
            'coordinator' => 1,
            'subject_category' => 'Programmeren 1',
            'subject_period' => '2',
            'subject_ec' => 4,
            'isChecked' => '0',
            'teacher_id' => '1',
        ]);

        DB::table('subjects')->insert([
        'subject_name' => 'REGEX',
        'subject_description' => 'Leren hoe je een eigen regex bouwt.',
            'coordinator' => 1,
            'subject_category' => 'Programmeren 1',
            'subject_period' => '3',
            'subject_ec' => 4,
            'isChecked' => '0',
            'teacher_id' => '1',
        ]);

        DB::table('assignments')->insert([
            'subject_id' => 1,
        ]);

        DB::table('assignments')->insert([
            'subject_id' => 2,
        ]);

        DB::table('assignments')->insert([
            'subject_id' => 3,
        ]);

    }
}
