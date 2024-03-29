<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'userID' => '1',
            'userIC' => '010516140274',
            'userName' => 'Admin',
            'userAddress' => 'Taman Makmur',
            'userPhoneNum' => '0182815400',
            'userRole' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
	User::create([
            'userID' => '2',
            'userIC' => '0102313123132',
            'userName' => 'FK Technical',
            'userAddress' => 'Hulu Langat',
            'userPhoneNum' => '019239812',
            'userRole' => 'FK Technical Team',
            'email' => 'fktechnical@gmail.com',
            'password' => Hash::make('fktechnical123'),
        ]);
	User::create([
            'userID' => '3',
            'userIC' => '012821386123',
            'userName' => 'FK Bursary',
            'userAddress' => 'Rompin',
            'userPhoneNum' => '019123912',
            'userRole' => 'FK Bursary',
            'email' => 'fkbursary@gmail.com',
            'password' => Hash::make('fkbursary123'),
        ]);
	User::create([
            'userID' => '4',
            'userIC' => '01379127931',
            'userName' => 'PUPUK Admin',
            'userAddress' => 'Kotasas',
            'userPhoneNum' => '0194329802',
            'userRole' => 'PUPUK Admin',
            'email' => 'pupukadmin@gmail.com',
            'password' => Hash::make('pupukadmin123'),
        ]);
    }
    
}