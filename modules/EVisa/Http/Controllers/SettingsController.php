<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 22/08/2017
 * Time: 10:45
 */

namespace Modules\EVisa\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Modules\BaseModule;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EVisa\Models\EVisa;

class SettingsController extends Controller
{
    public function __construct()
    {

    }

    public function allSettings(Request $request)
    {
        return view('e-visa::settings')
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