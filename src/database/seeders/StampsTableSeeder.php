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
        'submit' => '勤務開始'
         ];
        DB::table('stamps')->insert($param);

        $param = [
        'submit' => '勤務終了'
        ];
        DB::table('stamps')->insert($param);

        $param = [
        'submit' => '休憩開始'
        ];
        DB:table('stamps')->insert($param);

        $param = [
        'submit' => '休憩終了'
        ];
        DB::table('stamps')->insert($param);
    }
}
