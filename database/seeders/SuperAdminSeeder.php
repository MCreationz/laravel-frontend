<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $user = DB::table('users')->where('email', 'superadmin@gmail.com')->first();

        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'mobile' => '9999999999',
                'email_verified_at' => null,
                'password' => Hash::make('superadmin'),
                'company_id' => null,
                'status' => 1,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            // Update existing user password (optional but recommended)
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'password' => Hash::make('superadmin'),
                    'updated_at' => Carbon::now(),
                ]);

            $userId = $user->id;
        }

        // Assign role (assuming role_id = 1 is Super Admin)
        $roleExists = DB::table('role_user')
            ->where('user_id', $userId)
            ->where('role_id', 1)
            ->exists();

        if (!$roleExists) {
            DB::table('role_user')->insert([
                'user_id' => $userId,
                'role_id' => 1,
            ]);
        }
    }
}