<?php

namespace App\Http\Controllers;

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
        $m_categories = MCategoryTask::orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('pages.m-category-task.index', [
            'm_categories' => $m_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.m-category-task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMCategoryTaskRequest $request)
    {
        $data = $request->validated();

        $m_category = MCategoryTask::make($data);
        $m_category->saveOrFail();

        return redirect()->route('m_category_task.index')->with(['success' => 'Successfully store new category data.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MCategoryTask $m_category_task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MCategoryTask $m_category_task)
    {
        return view('pages.m-category-task.update', [
            'category' => $m_category_task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMCategoryTaskRequest $request, MCategoryTask $m_category_task)
    {
        $data = $request->validated();

        $m_category_task->fill($data);
        $m_category_task->saveOrFail();

        return redirect()->route('m_category_task.index')->with(['success' => 'Successfully updated category data.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MCategoryTask $m_category_task)
    {
        $m_category_task->delete();

        return redirect()->route('m_category_task.index')->with(['success' => 'Successfully deleted category data.']);
    }
}
