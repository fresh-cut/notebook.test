<?php

namespace Database\Seeders;

use App\Models\User;
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
        DB::table('users')->insert([
            [
                'name'=>'Неизвестный пользователь',
                'email'=>' unknownuser@gmail.com',
                'email_verified_at' => now(),
                'password'=>'/',
                'created_at'=>now()
            ],
            [
                'name'=>'Вадим Дорофеев Викторович',
                'email'=>'dorofeevvadim86@gmail.com',
                'email_verified_at' => now(),
                'password'=>'$2y$10$iajBhlQD177eBL9b2VchLuYxJyT3j0fTB8M8oJJHo.7hfEkR0OVrC',
                'created_at'=>now()
            ]
                ]
        );
        User::factory()->count(4)->create();
    }
}
