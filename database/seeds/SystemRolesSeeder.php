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
            'manage_modules' => 'Manage Modules', 'edit_users' => 'Edit Users',
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
        $permissions = $this->inserPermissions();

        foreach ($this->roles as $name => $perm_names) {
            $role = \App\Models\Role::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
            $perm_ids = $permissions->whereIn('name', $perm_names)->pluck('id')->toArray();
            $role->permissions()->sync($perm_ids);
        }

        if (isset($this->command)) {
            $this->command->getOutput()->writeln("<info>Roles and permissions seeded successfully:</info>");
        }
    }

    protected function inserPermissions()
    {
        $existing_perms = Permission::whereIn('name', array_keys($this->permissions))
            ->whereGuardName('web')
            ->pluck('name')->toArray();

        $new_perms = array_filter(array_keys($this->permissions), function ($p) use ($existing_perms) {
            return !in_array($p, $existing_perms);
        });

        $new_perms = array_map(function ($i) {
            return ['created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now(),
                'name' => $i, 'guard_name' => 'web', 'owner' => 'system', 'label' => $this->permissions[$i]];
        }, $new_perms);

        Permission::insert($new_perms);

        return Permission::all();
    }
}
