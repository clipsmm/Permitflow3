<?php

namespace App\Http\Controllers;

use App\Modules\BaseModule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $user;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        //load current module for views
        if($module  = $this->is_a_module_route()){
            view()->share('current_module', BaseModule::instance_from_slug($module->slug));
        }

        $this->middleware(function ($request, $next) {
            $this->user  = user();
            // get user's permitted modules
            if (Auth::user()){
                view()->share('my_modules', user()->modules()->where('enabled', true));
            }

            $this->block_unauthorized_backend();

            return $next($request);
        });

    }

    /**
     * Abort if permission(s) fail
     * @param string|array $permission
     * @param int $status
     */
    public function can($permission, $status  = 403)
    {
        if (!user()->can($permission)) abort($status, "Access Denied");
    }

    /**
     * Check if given permission(s) fail and closure evaluates false
     * @param string|array $permission
     * @param $closure
     * @param int $status
     * @internal param bool $strict
     */
    public function _can($permission, $closure, $status = 403)
    {
        if ((!user()->can($permission)) || !$closure() )
            abort($status, "Access Denied");
    }

    /**
     * If closure fails abort with 403
     * @param $closure
     * @param int $status
     */
    public function before($closure, $status = 403)
    {
        if (!$closure())
            abort($status, "Access Denied");
    }

    /**
     * @return null
     */
    private function is_a_module_route()
    {
        $result = null;

        BaseModule::get_enabled_modules()->each(function ($module)use (&$result){
            if(request()->is("*{$module->slug}*"))
                $result = $module;
        });

        return $result;

    }

    private function is_backend_route()
    {
        return \request()->is('*backend*');
    }

    private function block_unauthorized_backend()
    {
        // user is access a backend module route and is not an admin who can manage modules, ensure has access to the module
        if ($this->is_backend_route() && $this->is_a_module_route() && user() && !user()->can('system.manage_modules')){

            $module  =  $this->is_a_module_route();

            if (!user()->modules()->where('slug', $module->slug)->count())
                abort(403, __("messages.access_denied"));

            return;

        }

        return;
    }

}
