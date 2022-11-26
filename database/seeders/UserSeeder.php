<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Hiba',
            'email'=>'hibamahmudali@gmail.com',
            'email_verified_at'=>now(),
            'password'=>'123456789',
            'role'=>'admin',
            'remember_token' => Str::random(40)
        ]);
    }
}
