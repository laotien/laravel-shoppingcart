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
        $user = new User();
        $user->username = 'laotien';
        $user->first_name = 'System';
        $user->last_name = 'Admin';
        $user->email = 'luanlv.dev@gmail.com';
        $user->password = bcrypt('198789');
        $user->save();
    }
}
