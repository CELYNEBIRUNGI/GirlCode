<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'System Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'user_role' => 2,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ]
        ]);

        DB::table('rewards')->insert([
            [
                'id' => 1,
                'name' => 'FAIR SAVE',
                'description' => 'For savings below UGX 20000',
                'point_cost' => 500,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ],
              [
                'id' => 2,
                'name' => 'MODERATE SAVE',
                'description' => 'For savings between UGX 20000 and UGX 50000 ',
                'point_cost' => 1000,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
              ],
              [
                'id' => 3,
                'name' => 'GOOD SAVE',
                'description' => 'For the first saving.',
                'point_cost' => 10000,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ]
        ]);
    }
}
