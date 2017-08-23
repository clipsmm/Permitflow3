<?php

namespace App\Http\Controllers\Backend;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(Task $task)
    {
        $this->tasks = $task;
    }

    public function index()
    {
        //todo: ensure user has view rights and only load tasks from modules he/she has permissions on
        $tasks  = $this->tasks->with(['applications'])->paginate(20);

        return view('backend.tasks.index', [
            'tasks' => $tasks
        ])->with('page_title', __('pages.tasks_page'));
    }

}
