<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model implements \Spatie\Permission\Contracts\Permission
{
    //
    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        // TODO: Implement roles() method.
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }

    /**
     * Find a permission by its name.
     *
     * @param string $name
     * @param string|null $guardName
     *
     * @throws \Spatie\Permission\Exceptions\PermissionDoesNotExist
     *
     * @return \Spatie\Permission\Contracts\Permission
     */
    public static function findByName(string $name, $guardName): \Spatie\Permission\Contracts\Permission
    {
        return self::whereName($name)->whereGuard($guardName)->first();
    }
}
