<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = 0;
        $user->name = 'Slamet Septiawan';
        $user->email = 'slametseptiawan6@gmail.com';
        $user->password = Hash::make('@kembang303');
        $user->save();
    }
}
