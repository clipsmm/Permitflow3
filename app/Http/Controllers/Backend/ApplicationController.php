<?php

namespace App\Http\Controllers\Backend;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function indexModuleApplications(Request $request, $module)
    {
        $term  = $request->q;
        $applications  = collect([]);

        if ($term){
            $applications = Application::query()
                ->forModule($module->slug)
                ->where("applications.application_number",$term)
                ->orWhere("applications.form_data->passport_number", $term)
                ->get();
        }

        return view('backend.applications.index',[
            'applications' => $applications
        ]);
    }

    public function viewModuleApplication(Request $request, $module, Application $application)
    {
        $application->load(['invoices','tasks','current_invoice']);


        return view('backend.applications.view',[
            'application' => $application
        ]);

    }
}
