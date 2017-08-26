<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model implements \Spatie\Permission\Contracts\Permission
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function($p){
            $p->name = self::constructName($p->name, $p->owner);
        });
    }

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

    public static function constructName($name, $prefix)
    {
        return snake_case(implode('_', [studly_case($prefix), $name]));
    }
}
