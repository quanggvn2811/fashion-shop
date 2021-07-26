<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                'email'=>'fashion@gmail.com',
                'password'=>bcrypt('fashion@123'),
                'level'=>1
            ],
            [
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin@123'),
                'level'=>1
            ],
            [
                'email'=>'admin.example@gmail.com',
                'password'=>bcrypt('admin.ex@123'),
                'level'=>1
            ]

        ];
        DB::table('tbl_fs_users')->insert($data);
    }
}
