<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $superadminRole = Role::where('name', 'superadmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $siswaRole = Role::where('name', 'siswa')->first();
        $guruRole = Role::where('name', 'guru')->first();

        $superadmin = User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'password' => bcrypt('admin123'),
            'role_id' => $superadminRole->id
        ]);

        $admin = User::create([
            'name' => 'Admin Sekolah',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role_id' => $adminRole->id
        ]);

        $siswa = User::create([
            'name' => 'Siswa Dummy',
            'username' => 'siswa',
            'password' => bcrypt('admin123'),
            'role_id' => $siswaRole->id
        ]);

        $guru = User::create([
            'name' => 'Guru Dummy',
            'username' => 'guru',
            'password' => bcrypt('admin123'),
            'role_id' => $guruRole->id
        ]);

        $superadmin->roles()->attach($superadminRole);
        $admin->roles()->attach($adminRole);
        $siswa->roles()->attach($siswaRole);
        $guru->roles()->attach($guruRole);
    }
}

