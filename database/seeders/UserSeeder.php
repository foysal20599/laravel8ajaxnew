<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Foysal Ahmed', 'email' => 'foysal@gmail.com', 'password' => 'password'],
            ['name' => 'Shati Ahmed', 'email' => 'shati@gmail.com', 'password' => 'password'],
            ['name' => 'Arafat Ahmed', 'email' => 'arafat@gmail.com', 'password' => 'password'],
        ];
        User::insert($users);
    }
}
