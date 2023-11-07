<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $user = User::create([
            'first_name' => 'Anira',
            'last_name' => 'Developer',
            'email' => 'admin@anirachemicals.com',
            'mobile' => '7004857557',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Admin','guard_name' => 'web']);
        $role2 = Role::create(['name' => 'Manager','guard_name' => 'web']);
        $role3 = Role::create(['name' => 'Supervisor','guard_name' => 'web']);
        $role4 = Role::create(['name' => 'Employee','guard_name' => 'web']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}
