<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'username' => 'sammy',
            'email' => 'sam@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/user.png',
            'phone_number' => '0547576916',
            'full_name' => 'Samuel Owusu',
            'rank_id' => 1,
            'badge_number' => 'GH001',
        ]);
    }
}
