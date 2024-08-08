<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
                );
            
        }

        $desaignManagerRole = Role::firstOrCreate([
            'name' => 'desaign_manager'
        ]);
        $desaignManagerPermissions = [
            'manage products',
            'manage principles',
            'manage testimonials',
        ];
        $desaignManagerRole->syncPermissions($desaignManagerPermissions);


        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Company',
            'email' => 'super@admin.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($superAdminRole); 
            
        
    }
}
