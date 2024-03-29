<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;
use App\Models\User;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name'=>'Admin',
           'email'=>'admin@gmail.com',
           'number'=>'09075119203',
           'email_verified_at' => now(),
           'password' => bcrypt('password'),//'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           'remember_token' => Str::random(10),
           'is_admin'=> 1
       ]); //
    }
}
