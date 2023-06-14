<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        'user_id' => '0',
        'submit' => '0'
         ];
        DB::table('stamps')->insert($param);

        $param = [
        'user_id' => '1',
        'submit' => '1'
        ];
        DB::table('stamps')->insert($param);

        $param = [
        'user_id' => '2',
        'submit' => '2'
        ];
        DB:table('stamps')->insert($param);

        $param = [
        'user_id' => '3',
        'submit' => '3'
        ];
        DB::table('stamps')->insert($param);
    }
}
