<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Moniruzzaman',
            'email' => 'monirzuits100@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
