<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('created_by', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('pages.task.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();

        $task = Task::make($data);
        $task->created_by = Auth::user()->id;
        $task->saveOrFail();

        return redirect()->route('task.index')->with(['success' => 'Successfully store new task data.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('pages.task.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('pages.task.update', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->fill($data);
        $task->updated_by = Auth::user()->id;
        $task->saveOrFail();

        return redirect()->route('task.index')->with(['success' => 'Task successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')->with(['success' => 'Task successfully deleted.']);
    }
}
