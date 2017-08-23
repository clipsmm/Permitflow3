<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 18/08/2017
 * Time: 18:39
 */

namespace Modules;

use App\Models\Task;
use \Countries;
use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EVisa extends BaseModule implements ModuleInterface
{
    public $modelClass = \Modules\EVisa\Models\EVisa::class;

    public static $stages  = [
        'review' => [
            'reject' => [
                'color' => 'danger',
                'name' => 'Reject',
                'feedback' => true
            ],
            'corrections' => [
                'color' => 'warning',
                'name' => 'Send to Corrections',
                'feedback' => true
            ],
            'approve' => [
                'color' => 'primary',
                'name' => 'Approve',
            ]
        ]
    ];

    public function newUrl($params = [])
    {
        return route('e-visa.application.new', $params);
    }

    public function getValidator($request, $current_step)
    {
        switch ($current_step) {
            case 1:
                return Validator::make($request->all(), [
                    'country_of_application' => ['required', 'cca2'],
                    'applicant' => ['required', Rule::in(['self', 'agent', 'child', 'spouse'])]
                ]);
                break;
            case 2:
                return Validator::make($request->all(), [
                    'nationality' => ['required', 'cca2', 'countries_blacklist'],
                    'country_of_residence' => ['required', 'cca2'],
                    'city' => ['required'],
                    'physical_address' => ['required'],
                    'phone_number' => ['required', 'full_phone'],
                    'email' => ['required', 'email'],
                ], [
                    'phone_number.full_phone' => __('Use +2547********* format'),
                    'nationality.countries_blacklist' => _('Sorry, nationals of this country are not eligible for e-Visa')
                ]);
        }
    }

    public function handle_task(Task $task, $action, $comments = null)
    {
        switch($action){
            case '';
        }
    }
}