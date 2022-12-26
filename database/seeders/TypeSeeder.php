<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(
            [
                'name'  => 'Type 1',
                'description' => 'Description 1',
            ]
        );

        DB::table('types')->insert(
            [
                'name'  => 'Type 2',
                'description' => 'Description 2',
            ]
        );

        DB::table('types')->insert(
            [
                'name'  => 'Type 3',
                'description' => 'Description 3',
            ]
        );

        DB::table('types')->insert(
            [
                'name'  => 'Type 4',
                'description' => 'Description 4',
            ]
        );
    }
}
