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
        return view('backend.tasks.index', [
            'tasks' => []
        ])->with('page_title', __('pages.tasks_page'));
    }

    public function show(Request $request, $module, Task $task)
    {
        //todo: ensure user can view this task

        return view('backend.tasks.view',[
            'task' => $task,
            'module' => $module
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

    public function pickTask(Request $request)
    {
        $task = Task::pick_task($request->get('task_id'));

        if (!$task){
            return redirect()->back()
                ->with('alerts', [
                    ['type' => 'danger', 'message' => __('messages.no_tasks_available')]
                ]);
        }

        return redirect()->route('backend.tasks.view', [$task->id]);
    }



}
