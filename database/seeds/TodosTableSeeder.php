<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '掃除',
            'description' => '最近掃除していない所',
            'user_id' => '333',
            'floor_id' => '3',
            'expired_at' => new \DateTime(),
        ];
        DB::table('todos')->insert($param);

        $param = [
            'content' => '準備',
            'description' => '旅行の荷造り',
            'user_id' => '222',
            'floor_id' => '1',
            'expired_at' => new \DateTime(),
        ];
        DB::table('todos')->insert($param);

        $param = [
            'content' => '足りない物',
            'description' => '日用品や食材',
            'user_id' => '555',
            'floor_id' => '2',
            'expired_at' => new \DateTime(),
        ];
        DB::table('todos')->insert($param);
    }
}
