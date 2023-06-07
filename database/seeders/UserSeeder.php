<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'username' => 'admin',
            'email' => 'fashionspectra@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'name' => 'Adminstrator',
        ]);

        foreach ($data as $item) {
            User::create([
                'username' => $item['username'],
                'email' => $item['email'],
                'password' => $item['password'],
                'role' => $item['role'],
                'name' => $item['name'],
            ]);
        }
    }
}
