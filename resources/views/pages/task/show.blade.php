@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">Task Detail</h6>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-borderless table-hover">
            <tbody>
              <tr>
                <th>Title</th>
                <td>: {{ $task->title }}</td>
              </tr>
              
              <tr>
                <th>Category</th>
                <td>: {{ $task->m_category_task->name }}</td>
              </tr>

              <tr>
                <th>Due Date</th>
                <td>: {{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y H:i:s') }}</td>
              </tr>

              <tr>
                <th>Description</th>
                <td>: {{ $task->description }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('task.index') }}" class="btn btn-sm btn-secondary">back</a>
      </div>
    </div>
  </div>
@endsection