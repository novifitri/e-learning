<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('password'),
        ]);
        $role = Role::create(["name" => "admin"]);
        // $admin->assignRole("admin");
        $permission = Permission::create(['name' => 'manage role']);
        $role->givePermissionTo($permission);
        // $permissions = Permission::pluck("id", "id")->all();
        // $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

    }
}
