<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class SystemRolesSeeder extends Seeder
{
    /*
     * RUNNING THIS SEEDER MULTIPLE TIMES ONLY INSERTS NEW ROLES/PERMISSIONS
     */

    /*
     * These are test permissions.
     * Add more permissions
     */
    protected $permissions =
        [
            'manage_modules' => 'Manage Modules',
            'edit_users' => 'Edit Users',
            'edit_user_roles' => 'Edit User Roles'
        ];

    /*
     * These are test roles
     * Add more roles here as name => [perms]
     *
     */
    protected $roles = [
        'Super User' => ['manage_modules', 'edit_users', 'edit_user_roles'],
    ];

    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        $permissions = $this->insertPermissions();

        foreach ($this->roles as $name => $perm_names) {
            $role = \App\Models\Role::firstOrCreate(['name' => $name, 'guard_name' => 'web']);

            $perm_names = array_map(function($n){
                return permission_name($n, 'system');
            }, $perm_names);

            $perm_ids = $permissions->whereIn('name', $perm_names)->pluck('id')->toArray();

            $role->permissions()->sync($perm_ids);
        }

        if (isset($this->command)) {
            $this->command->getOutput()->writeln("<info>Roles and permissions seeded successfully:</info>");
        }
    }

    protected function insertPermissions()
    {
        foreach ($this->permissions as $name => $label){
            $p = Permission::whereName(permission_name($name, 'system'))->first();
            if(is_null($p)){
                Permission::create(['name' => $name, 'label' => $label, 'owner' => 'system', 'guard_name' => 'web']);
            }

        }

        return Permission::all();
    }
}
