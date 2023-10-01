<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MCategoryTask\StoreMCategoryTaskRequest;
use App\Http\Requests\MCategoryTask\UpdateMCategoryTaskRequest;
use App\Models\MCategoryTask;
use Illuminate\Http\Request;

class MCategoryTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Successfully retrieve all task categories data.',
            'data' => MCategoryTask::orderBy('created_at', 'DESC')
                ->get()
        ]);
    }

    public function getOne(String $id)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Successfully retrieve task category data.',
            'data' => MCategoryTask::where('id', $id)
                ->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMCategoryTaskRequest $request)
    {
        $data = $request->validated();

        $m_category = MCategoryTask::make($data);
        $m_category->saveOrFail();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully created new task category data.',
            'data' => $m_category
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
    public function update(UpdateMCategoryTaskRequest $request, string $id)
    {
        $data = $request->validated();

        $m_category = MCategoryTask::where('id', $id)->first();
        $m_category->fill($data);
        $m_category->saveOrFail();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated task category data.',
            'data' => $m_category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $m_category = MCategoryTask::where('id', $id)->first();

        $m_category->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Category task successfully deleted.',
        ]);
    }
}
