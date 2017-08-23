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

    public function __construct(Task $task)
    {
        $this->tasks = $task;
        $modules  = Module::enabled();

        view()->share('my_modules', $modules);
    }

    public function index()
    {
        return view('backend.tasks.dashboard', [
            'tasks' => []
        ])->with('page_title', __('pages.tasks_page'));
    }

    public function show(Request $request, $module, Task $task)
    {
        //todo: ensure user can view this task

        $actions = $module->get_task_actions($task);

        return view('backend.tasks.view',[
            'task' => $task,
            'module' => $module,
            'actions' => $actions
        ]);
    }

    public function myQueue(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->queued()
            ->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __('pages.tasks_page'));
    }

    public function myInbox(Request $request, $module)
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['application'])
            ->module($module->slug)
            ->myTasks()
            ->processing()
            ->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks,
            'module' => $module
        ])->with('page_title', __('pages.tasks_page'));
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
        ])->with('page_title', __('pages.tasks_page'));
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
        ])->with('page_title', __('pages.tasks_page'));
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
        ])->with('page_title', __('pages.tasks_page'));
    }

    public function pickTask(Request $request, $module)
    {
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
