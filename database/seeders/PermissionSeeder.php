<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = Role::all()->keyBy('id');

        $permissions = [
            'properties-manage' => [Role::ROLE_PROPERTY_OWNER],
            'bookings-manage'   => [Role::ROLE_PROPERTY_OWNER, Role::ROLE_PROPERTY_OWNER],
        ];

        foreach ($permissions as $key => $roles) {
            $permission = Permission::create([
                'name' => $key,
            ]);

            foreach ($roles as $role) {
                $allRoles[$role]->permissions()->attach($permission->id);
            }
        }
    }
}
