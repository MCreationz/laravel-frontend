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
        // Ensure role exists first
        $role = DB::table('roles')->where('name', 'super_admin')->first();

        if (!$role) {
            $roleId = DB::table('roles')->insertGetId([
                'name' => 'super_admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $roleId = $role->id;
        }

        // Create or update user
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
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'password' => Hash::make('superadmin'),
                    'updated_at' => Carbon::now(),
                ]);

            $userId = $user->id;
        }

        // Attach role safely
        DB::table('role_user')->updateOrInsert(
            [
                'user_id' => $userId,
                'role_id' => $roleId,
            ],
            []
        );
    }
}