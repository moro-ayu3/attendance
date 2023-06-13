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
        'date_id' => 1,
        'user_id' => 1,
        'submit' => '勤務開始'
         ];
        DB::table('stamps')->insert($param);

        $param = [
        'date_id' => 2,
        'user_id' => 2,
        'submit' => '勤務終了'
        ];
        DB::table('stamps')->insert($param);

        $param = [
        'date_id' => 3,
        'user_id' => 3,
        'submit' => '休憩開始'
        ];
        DB:table('stamps')->insert($param);

        $param = [
        'date_id' => 4,
        'user_id' => 4,
        'submit' => '休憩終了'
        ];
        DB::table('stamps')->insert($param);
    }
}
