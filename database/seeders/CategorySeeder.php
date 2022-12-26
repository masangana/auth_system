<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'name'  => 'Category 1',
                'description' => 'Description 1',
            ]
        );

        DB::table('categories')->insert(
            [
                'name'  => 'Category 2',
                'description' => 'Description 2',
            ]
        );

        DB::table('categories')->insert(
            [
                'name'  => 'Category 3',
                'description' => 'Description 3',
            ]
        );

        DB::table('categories')->insert(
            [
                'name'  => 'Category 4',
                'description' => 'Description 4',
            ]
        );

        DB::table('categories')->insert(
            [
                'name'  => 'Category 5',
                'description' => 'Description 5',
            ]
        );
    }
}
