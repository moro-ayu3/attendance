<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
         'date' => '2021-11-01',
         'name' => 'テスト太郎',
         'time' => '10:00:00',
         'time' => '20:00:00',
         'time' => '00:30:00',
         'time' => '09:29:50',
        ];
        DB::table('dates')->insert($param);
    }
}
