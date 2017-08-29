<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 22/08/2017
 * Time: 10:45
 */

namespace Modules\EVisa\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Modules\BaseModule;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Modules\EVisa\Models\EVisa;

class SettingsController extends Controller
{

    public function allSettings(Request $request)
    {
        $country_codes = \Countries::all()->pluck('name.common', 'cca2')->toArray();

        return view('e-visa::settings', ['country_codes' => $country_codes])
            ->with('page_tile', __('e-visa::labels.settings_page_title'));
    }

    public function saveSettings(Request $request)
    {
        $input  = $request->except('_token');

        settings($input);

        return redirect()->back()
            ->with('alerts', [
                ['type' => 'success', 'message' => __("e-visa::messages.settings_saved")]
            ]);
    }
}