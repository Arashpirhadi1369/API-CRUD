<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'superadministrator',
            'email'     => 'superadministrator@test.com',
            'password'  => Hash::make('superadministrator@test.com'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name'      => 'administrator',
            'email'     => 'administrator@test.com',
            'password'  => Hash::make('administrator@test.com'),
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([
            'name'      => 'user',
            'email'     => 'user@test.com',
            'password'  => Hash::make('user@test.com'),
            'api_token' => Str::random(60),
        ]);

        DB::table('role_user')->insert([
            'role_id'      => '1',
            'user_id'     => '1',
            'user_type'  => 'App\Models\User',
        ]);

        DB::table('role_user')->insert([
            'role_id'      => '2',
            'user_id'     => '2',
            'user_type'  => 'App\Models\User',
        ]);

        DB::table('role_user')->insert([
            'role_id'      => '3',
            'user_id'     => '3',
            'user_type'  => 'App\Models\User',
        ]);
    }
}
