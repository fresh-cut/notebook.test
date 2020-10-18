<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'Вадим Дорофеев Викторович',
                'email'=>'dorofeevvadim86@gmail.com',
                'password'=>'$2y$10$iajBhlQD177eBL9b2VchLuYxJyT3j0fTB8M8oJJHo.7hfEkR0OVrC',
                'created_at'=>now()
            ]
        );
    }
}
