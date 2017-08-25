<?php

namespace App\Http\Controllers\Backend;

use App\Modules\BaseModule;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function generalSettings(Request $request)
    {
        $active_modules  = BaseModule::get_enabled_modules()->pluck('name','slug')->toArray();

        return view('backend.settings.general',[
            'a_mods' => $active_modules
        ]);
    }

    public function saveGeneralSettings(Request $request)
    {
        $input  = $request->except('_token');

        settings($input);

        return redirect()->back()
            ->with('alerts', [
                ['type' => 'success', 'message' => __("messages.settings_saved")]
            ]);
    }

}
