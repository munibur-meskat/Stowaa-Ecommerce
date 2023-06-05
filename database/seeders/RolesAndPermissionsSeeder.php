<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::create([
            'name' => "Meskat",
            'user_name' => "superadmin",
            'email' => "munibur@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

 
        $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
        $user->assignRole($role);

        $arrayOfPermissionNames = ['create category','can see category','can delete category','edit profile', 'role create', 'role delete', 'role edit', 'role show', 'can see colour', 'can delete colour', 'can see size', 'can delete size','user show','user create'];
        
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });
    
        Permission::insert($permissions->toArray());

        Role::create(['name' => 'user']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'editor']);
    }
}