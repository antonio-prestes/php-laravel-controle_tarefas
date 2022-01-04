<?php

namespace App\Http\Controllers;

use App\Exports\TasksExport;
use App\Mail\NewTaskMail;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;

        $tasks = Task::where('user_id', $user)->paginate(5);

        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        $task = Task::create($data);
        $sendTo = auth()->user()->email;

        Mail::to($sendTo)->send(new NewTaskMail($task));

        return redirect()->route('show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $user_id = auth()->user()->id;
        if ($task->user_id == $user_id) {
            return view('task.edit', ['task' => $task]);
        } else {
            return view('erro402');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $user_id = auth()->user()->id;
        if ($task->user_id == $user_id) {
            $task->update($request->all());
            return redirect()->route('show', ['task' => $task->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if (!$task->user_id == auth()->user()->id) {
            return view('erro402');
        }
        $task->delete();
        return redirect()->route('index');
    }

    public function export()
    {
        return Excel::download(new TasksExport, 'task.xlsx');
    }
}
