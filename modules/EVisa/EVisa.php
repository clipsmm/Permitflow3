<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 18/08/2017
 * Time: 18:39
 */

namespace Modules;

use App\Events\ApplicationSubmitted;
use App\Models\Application;
use App\Models\Invoice;
use App\Models\Task;
use Carbon\Carbon;
use \Countries;
use App\Interfaces\ModuleInterface;
use App\Modules\BaseModule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\EVisa\FormValidator;
use Modules\EVisa\Models\EntryPoint;
use Modules\EVisa\TaskHandler;
use Modules\Evisa\Listeners\EvisaApplicationSubmittedHandler;

class EVisa extends BaseModule implements ModuleInterface
{
    public $modelClass = \Modules\EVisa\Models\EVisa::class;

    /**
     * Module specific event /listener pairs
     *
     * @var array
     */

    public $stages = [
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
                'method' => 'post',
                'label' => 'Approve',
                'icon' => 'fa fa-check',
                'confirm' => 'Are you sure you want to approve application?',
                'classes' => 'btn btn-sm btn-primary',
                'data' => [
                    'action' => 'approve'
                ],
                'url' => ''
            ]
        ]
    ];


    public $numSteps = 4;

    public static function getTravelReasons()
    {
        return [
            'business' => __('Business'),
            'education' => __('Education'),
            'medical' => __('Medical'),
            'employment' => __('Employment'),
            'religion' => __('Religion'),
            'family' => __('Settlement/Family'),
            'tourism' => __('Tourism'),
            'others' => __('Others'),
        ];
    }

    public function getServiceName()
    {
        return 'Visa Application';
    }

    public function newUrl($params = [])
    {
        return route('e-visa.application.new', $params);
    }

    public function get_edit_url($application, $params = [])
    {
        return route('e-visa.application.edit', ['application' => $application->id] + $params);
    }

    public function loadLookupData($model)
    {
        return [
            'country_codes' => \Countries::all()->pluck('name.common', 'cca2'),
            'travel_reasons' => self::getTravelReasons()
        ];
    }

    public function getValidator($request, $current_step)
    {
        return $this->makeValidator($request->all(), $current_step);
    }

    public function makeValidator($data, $current_step)
    {
        return (new FormValidator())->make($data, $current_step);
    }

    public static function getVisaTypes()
    {
        return [
            'multiple_entry_visa' => __("Multiple Entry Visa"),
            'single_entry' => __('Single Entry Visa'),
            'transit_visa' => __('Transit Visa'),
            'tourist_visa' => __('East Africa Tourist Visa'),
        ];
    }

    public function handle_task(Task $task, $action, $comments = null)
    {
        $task->load(['application', 'application.user']);

        $handler = new TaskHandler($task);

        switch ($action) {
            case 'reject':
                $handler->reject_application($comments);
                break;
            case 'corrections':
                $handler->send_to_corrections($comments);
                break;
            case 'approve':
                $handler->approve_application();
                break;
            default:
                throw new \Exception(__('errors.undefined_task'));
                break;
        }
    }


    public function create_invoice($application)
    {
        //todo: consider other checks before creating invoice
        if ($application->submitted_at) {
            return null;
        }

        $cost = settings($this->slug.".costs.".$application->get_data('visa_type'), 0);

        if (!$cost){
            Task::create_task($application->id, array_get(self::getVisaTypes(), $application->get_data('visa_type')),'review','pending');
            return null;
        }

        return Invoice::create_invoice($application->id, [['amount' => $cost, 'description' => 'foo']], "Application No {$application->application_number}");
    }

    public function get_permissions()
    {
        return [
            ['name' => 'review.approve', 'label' => 'Approve Application', 'guard' => 'web'],
            ['name' => 'review.reject', 'label' => 'Reject Application', 'guard' => 'web']
        ];
    }

    public function render_settings_view()
    {
        // TODO: Implement render_settings_view() method.
    }

    public function get_menus()
    {
        return [
            [
                'name' => __('e-visa::menus.tasks'),
                'action' => route('backend.tasks.queue', $this->slug),
                'icon' =>   asset('images/task4.svg'),
                'type' => 'task-img'
            ],
            [
                'name' => __('e-visa::menus.applications'),
                'action' => route('backend.applications.index', $this->slug),
                'icon' => asset('images/applications.svg'),
                'type' => 'task-img'
            ],
            [
                'name' => __('labels.outputs'),
                'action' => route("backend.outputs.index", $this->slug),
                'icon' => asset('images/reports.svg'),
                'type' => 'task-img'
            ],
            [
                'name' => __('e-visa::menus.settings'),
                'action' => route('e-visa.settings.all'),
                'icon' => asset('images/settings.svg'),
                'type' => 'task-img'
            ],



        ];
    }

    public function get_landing_page()
    {
        return view("{$this->slug}::landing", [
            'module' => $this
        ])->with("page_title", __("{$this->slug}::labels.landing_page_title"));
    }

    public function getApplicationActions($application)
    {
        return [
        ];
    }


    public function authorizeTask($task, $user)
    {
        return true;
    }

    public function loadOutputData($output)
    {
        switch($output->code){
            case 'EVISA-OUTPUT':
                return [
                    'entry_points' => EntryPoint::all(),
                    'country_codes' => \Countries::all()->pluck('name.common', 'cca2'),
                    'travel_reasons' => self::getTravelReasons()
                ];
        }

        return [];
    }

    public function canDeleteApplication($application){
        return $application->status == Application::TEMPORARY;
    }
}