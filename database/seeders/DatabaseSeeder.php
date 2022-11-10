<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        \DB::table('users')->insert(['name'=>'universitas teknokrat','email'=>'teknokratindonesia@gmail.com','password'=>Hash::make('123teknoIndonesia')]);
    }
}
