<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        'user_id' => '1',
        'date' => '2023-06-22',
        'work_start_time' => '10:00:00',
        'work_end_time' => '19:00:00',
         ];
        DB::table('attendances')->insert($param);
    }
}
