<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \Illuminate\Support\Facades\DB::table('users')
           ->insert([
                'name'=> 'Qismet',
                'surname'=> 'Huseyn',
                'number'=> '705713112',
                'email'=> 'qismeths60@gmail.com',
                'password'=> bcrypt('qismethusein'),
           ]);
    }
}
