<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\RoleDoesNotExist;

class Role extends Model implements \Spatie\Permission\Contracts\Role
{
    protected $table = 'roles';

    protected $guarded = ['id'];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        // TODO: Implement permissions() method.
        return $this->belongsToMany(\App\Models\Permission::class, 'role_has_permissions');
    }

    /**
     * Find a role by its name and guard name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @return \Spatie\Permission\Contracts\Role
     *
     * @throws RoleDoesNotExist
     */
    public static function findByName(string $name, $guardName): \Spatie\Permission\Contracts\Role
    {
        // TODO: Implement findByName() method.
        return self::whereName($name)->whereGuard($guardName)->first();
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param string|Permission $permission
     *
     * @return bool
     */
    public function hasPermissionTo($permission): bool
    {
        // TODO: Implement hasPermissionTo() method.
        return is_null($this->permissions->first(function($perm) use($permission){
            return $perm->name == $permission;
        }));

    }
}
