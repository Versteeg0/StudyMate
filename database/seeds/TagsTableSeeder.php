<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tag_name' => 'Moeilijk',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Veel werk',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Weinig werk',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Makkelijk',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Leuk',
        ]);

        DB::table('tags')->insert([
            'tag_name' => 'Niet leuk',
        ]);
    }
}
