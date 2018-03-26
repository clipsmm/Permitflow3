<?php

namespace App\Http\Controllers\Backend;

use App\Models\Task;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    protected $tasks;
    protected $modules;
    protected $stats = [];

    public function __construct(Task $task)
    {
        parent::__construct();

        $this->tasks = $task;

        $module  =  module();

        $this->middleware(function ($request, $next) use($module) {
            $this->user  = user();

            $this->stats = [
                'queue' => $this->tasks->module($module->slug)->queued()->count(),
                'inbox' => $this->tasks->module($module->slug)->myTasks($this->user)->processing()->inCorrections(false)->count(),
                'corrections' => $this->tasks->module($module->slug)->myTasks($this->user)->processing()->inCorrections()->count(),
                'completed' => $this->tasks->module($module->slug)->myTasks($this->user)->completed()->count(),
            ];

            view()->share('task_stats', $this->stats);;

            return $next($request);
        });


    }

    public function index()
    {
        return view('backend.tasks.dashboard', [
            'tasks' => []
        ])->with('page_title', __('Tasks'));
    }

    public function show(Request $request, $module, Task $task)
    {
        //todo: ensure user can view this task

        $task->load(['application', 'application.user','application.tasks',
            'application.invoices', 'application.corrections', 'application.corrections.task','application.corrections.task.user']);

        $actions = $module->get_task_actions($task);

        return view('backend.tasks.view',[
            'task' => $task,
            'module' => $module,
            'actions' => $actions
        ])->with('page_title', __('Task Details'));
    }

    public function myQueue(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->queued($module->slug)
            ->paginate(20);

//        $filtered = array_filter($tasks->items(), function($task){
//            return $task->application->module->authorizeTask($task, auth()->user());
//        });
//
//        $tasks->setItems($filtered);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __("Queued Tasks"));
    }

    public function myInbox(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->myTasks()
            ->processing()
            ->inCorrections(false)
            ->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __("My Tasks"));
    }

    public function myOutbox(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->myTasks()
            ->completed()
            ->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __("Completed Tasks"));
    }

    public function myInCorrection(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->myTasks()
            ->processing()
            ->inCorrections()
            ->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __("Corrections"));
    }

    public function allProcessing(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->queued()
            ->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __("Processing"));
    }

    public function pickTask(Request $request, $module)
    {
        //issue: #53: Limit the number of tasks a reviewer can pick to 3 before allowing to pick more tasks
        //todo: make this configurable
        if ($this->tasks->with(['application'])
            ->module($module->slug)
            ->myTasks()
            ->processing()
            ->inCorrections(false)->count()  > 2)
            return redirect()->back()
                ->with('alerts', [
                    ['type' => 'danger', 'message' => __('messages.max_tasks_exceeded')]
                ]);

        //get any available task
        $task = Task::pick_task($module->slug, $request->get('task_id'));

        if (!$task){
            return redirect()->back()
                ->with('alerts', [
                    ['type' => 'danger', 'message' => __('messages.no_tasks_available')]
                ]);
        }

        return redirect()->route('backend.tasks.show', [$module->slug, $task->id]);
    }

    public function handleTask($module, Task $task, Request $request)
    {
        $this->validate($request, [
            'action' => "required"
        ]);
        $_action = $request->input('action');

        try{
            $action = $module->get_task_actions($task)[$_action];
        } catch (\Exception $e){
            throw  $e;
        }

        $rule = array_get($action, 'feedback',false) ? "required" : "nullable";

        $this->validate($request, [
            'comment' => $rule
        ]);

        $comment = $request->input('comment');

        $module->handle_task($task, $_action, $comment);

        //todo: check if module auto pick task is enabled and pick next task
        return redirect()->route('backend.tasks.show', [$module->slug, $task->id])
            ->with('alerts', [
                ['type' => 'success', 'message' => __('messages.task_handled')]
            ]);
    }



}
