@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6>task update</h6>
      </div>
      
      <form method="post" action="{{ route('task.update', $task) }}">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" class="form-control {{ !$errors->has('title')?:'is-invalid' }}">
            @error('title')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="datetime-local" name="due_date" id="due_date" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d H:i:s') }}" class="form-control {{ !$errors->has('due_date')?:'is-invalid' }}">
            @error('due_date')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control {{ !$errors->has('description')?:'is-invalid' }}">{{ $task->description }}</textarea>
            @error('description')
              <small class="invalid-feedback">{{ $message }}</small>              
            @enderror
          </div>

          <div class="form-group">
            <label for="m_category_task_id" class="form-label">Task Category</label>
            <select name="m_category_task_id" id="m_category_task_id" class="form-control {{ !$errors->has('m_category_task_id')?:'is-invalid' }}">
              @foreach (\App\Models\MCategoryTask::all() as $category)
                <option value="{{ $category->id }}" {{ $task->m_category_task_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-sm btn-success">update</button>
        </div>
      </form>
    </div>
  </div>
@endsection