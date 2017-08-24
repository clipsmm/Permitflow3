<?php

namespace App\Http\Controllers\Backend;

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
}
