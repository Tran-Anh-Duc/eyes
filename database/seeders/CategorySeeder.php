<?php

namespace Database\Seeders;

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
           ["name"=>"Family0","user_id"=>1],
           ["name"=>"Family1","user_id"=>2],
           ["name"=>"Family2","user_id"=>1],
           ["name"=>"Family3","user_id"=>2],
        ]);
    }
}
