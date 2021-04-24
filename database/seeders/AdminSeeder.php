<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'first_name' => 'admin',
            'last_name' => 'admin',
        	'email' => 'admin@gmail.com',
            'dob' => Carbon::now(),
        	'password' => Hash::make('admin'),
            'role' => User::ROLE_ADMIN
        ]);
    }
}
