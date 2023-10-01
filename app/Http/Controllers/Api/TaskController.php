<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json([
            'status' => 200,
            'message' => 'Successfully retrieve all tasks data.',
            'data' => Task::where('created_by', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->get()
        ]);
    }

    public function getOne(String $id)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Successfully retrieve task data.',
            'data' => Task::where('id', $id)
                ->where('created_by', Auth::user()->id)
                ->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();

        $task = Task::make($data);
        $task->saveOrFail();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully created new task data.',
            'data' => $task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $data = $request->validated();

        $task = Task::where('id', $id)->first();

        $task->fill($data);
        $task->saveOrFail();

        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil diubah',
            'data' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::where('id', $id)->first();

        $task->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Task successfully deleted.',
        ]);
    }
}
