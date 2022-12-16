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
        DB::table('categories')->insert([
            [
             'title'=>'general',
             'description'=>'general',
             'created_at'=>date('Y-m-d H:i:s'),
             'updated_at'=>date('Y-m-d H:i:s')
            ],
            [
                'title'=>'shooping',
                'description'=>'compras',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
               ]
            ]);
    }
}
