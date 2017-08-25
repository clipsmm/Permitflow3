<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Modules\BaseModule;
use Illuminate\Http\Request;

class RolesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $guard_name = 'web';

    public function index()
    {
        $roles = Role::all();
        return view("backend.roles.index", compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $active_modules = BaseModule::get_enabled_modules();
        $permissions = $this->loadPermissions($active_modules->pluck('slug')->toArray());
        $module_permissions = $permissions->filter(function($v, $k){return $k != 'system';});

        return view("backend.roles.create", ['module_permissions' => $module_permissions, 'role' => new Role(), 'permissions' => $permissions, 'active_modules' => $active_modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        \DB::transaction(function() use($request){
            $role = Role::create(['name' => $request->name, 'guard_name' => $this->guard_name]);
            $role->permissions()->sync($request->permissions);
        });

        return redirect("backend/roles");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit($role_id)
    {
        $active_modules = BaseModule::get_enabled_modules();
        $permissions = $this->loadPermissions($active_modules->pluck('slug')->toArray());
        $module_permissions = $permissions->filter(function($v, $k){return $k != 'system';});
        $role = Role::find($role_id);

        return view("backend.roles.edit", ['module_permissions' => $module_permissions, 'role' => $role, 'permissions' => $permissions, 'active_modules' => $active_modules]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $role = Role::find($role);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        \DB::transaction(function() use($request, $role){
            $role->update(['name' => $request->name, 'guard_name' => 'web']);
            $role->permissions()->sync($request->permissions);
        });

        return redirect("backend/roles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    private function loadPermissions($active_modules)
    {
        return Permission::all()
            ->filter(function ($p) use($active_modules){
                return $p->owner == 'system' || in_array($p->owner, $active_modules);
            })
            ->groupBy('owner');
    }
}
