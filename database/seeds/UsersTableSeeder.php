<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1
            ],
            [
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 2
            ],




        ];

        DB::table('vp_users')->insert($data);
    }
}
