@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">create task</h6>
      </div>

      <form method="post" action="{{ route('task.store') }}">
        @csrf
        <div class="card-body">
          <div class="form-group mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control {{ !$errors->has('title')?:'is-invalid' }}" placeholder="Title">
            @error('title')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="datetime-local" name="due_date" id="due_date" class="form-control {{ !$errors->has('due_date')?:'is-invalid' }}">
            @error('due_date')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="description" class="form-label"></label>
            <textarea name="description" id="description" cols="30" rows="4" placeholder="Description" class="form-control {{ !$errors->has('description')?:'is-invalid' }}"></textarea>
            @error('description')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="m_category_task_id" class="form-label">Category</label>
            <select name="m_category_task_id" id="m_category_task_id" class="form-control {{ !$errors->has('m_category_task_id')?:'is-invalid' }}">
              <option value="" selected>Select category</option>
              @foreach (\App\Models\MCategoryTask::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-sm btn-success">add</button>
        </div>
      </form>
    </div>
  </div>
@endsection