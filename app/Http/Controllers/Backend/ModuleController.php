<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Models\Permission;
use App\Models\User;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    protected $modules;

    public function __construct()
    {
        $this->modules = Module::all();
    }

    public function index()
    {
        $items = $this->modules->map(function($item){
            return (object)$item;
        });

        return view('backend.modules.index', [
            'modules' => $items
        ])->with("page_title", __("labels.modules_page_title"));
    }

    public function show(Request $request, $module)
    {
        return view('backend.modules.view',[
            'module' => $module
        ])->with('page_title', __("labels.view_module_page_title"));
    }

    public function users(Request $request, $module)
    {
        $users  =  $module->users()->paginate(20);

        return view("backend.modules.users", [
            'users' => $users,
            'module' => $module
        ]);
    }

    public function editUser(Request $request, $module, User $user)
    {
        $user->load(['permissions']);

        $permissions  =  Permission::query()->whereOwner($module->slug)->get();

        return view('backend.modules.edit_user',[
            'module' => $module,
            'user' => $user,
            'permissions' => $permissions
        ]);
    }

    public function updateUserPermissions(Request $request, $module, User $user)
    {
        $this->validate($request, [
            'permissions' => "required|array|min:1"
        ]);

        DB::transaction(function() use ($request, $module, &$user){
            // get all permissions for the modules
            $permissions  =  Permission::query()->whereOwner($module->slug)->get()->pluck('id')->toArray();

            // revoke all user permissions for the module
            $user->permissions()->detach($permissions);

            // get all permissions not related to this module that the user currently has
            $old  = $user->permissions()->get()->pluck('id')->toArray();

            // sync old and new permissions
            $user->permissions()->sync($old + $request->permissions);
        });

        return redirect()->back()
            ->with('alerts', [
                ['type' => 'success', 'message' => __("Changes saved successfully")]
            ]);
    }

    public function removeUser(Request $request, $module, User $user)
    {
        DB::transaction(function() use ($request, $module, &$user){
            // get all permissions for the modules
            $permissions  =  Permission::query()->whereOwner($module->slug)->get()->pluck('id')->toArray();

            // revoke all user permissions for the module
            $user->permissions()->detach($permissions);

            // remove user from module
            \DB::table('module_user')->where('module_slug', $module->slug)->delete();
        });

        return redirect()->back()
            ->with('alerts', [
                ['type' => 'success', 'message' => __("User removed from module successfully")]
            ]);
    }
}
