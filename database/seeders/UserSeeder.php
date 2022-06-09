<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

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
            'username' => 'admin',
            'password' => bcrypt("admin"),
            'role' => 'Admin',
            'status' => '1',

        ];
        User::create($users);

    }
}
