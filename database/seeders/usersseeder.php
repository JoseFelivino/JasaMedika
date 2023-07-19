<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class usersseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Admin','email'=>'Admin@gmail.com','password'=>\Illuminate\Support\Facades\Hash::make('abcd1234'), 'role'=>'Admin','created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Operator','email'=>'Operator@gmail.com','password'=>\Illuminate\Support\Facades\Hash::make('abcd1234'),  'role'=>'Operator','created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')],
           ]);
    }
}
