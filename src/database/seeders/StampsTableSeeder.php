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
        'user_id' => '1',
        'submit' => '10:00:00',
        'submit' => '20:00:00',
        'submit' => '00:30:00',
        'submit' => '09:29:50',
         ];
        DB::table('stamps')->insert($param);
    }
}
