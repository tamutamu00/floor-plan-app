<?php

use Illuminate\Database\Seeder;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'キッチン',
            'user_id' => '222',
        ];
        DB::table('floors')->insert($param);

        $param = [
            'name' => 'リビング',
            'user_id' => '333',
        ];
        DB::table('floors')->insert($param);

        $param = [
            'name' => '玄関',
            'user_id' => '555',
        ];
        DB::table('floors')->insert($param);
    }
}
