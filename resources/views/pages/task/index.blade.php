@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">tasks list</h6>
      </div>

      {{-- flash message --}}
      @include('components.alert')

      <div class="card-body">
        <a href="{{ route('task.create') }}" class="btn btn-sm btn-success mb-4">create task</a>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Title</th>
                <th>Due Date</th>
                <th>Category</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
                <tr>
                  <td>{{ $task->title }}</td>
                  <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d-m-Y H:i:s') }}</td>
                  <td>{{ $task->m_category_task->name }}</td>
                  <td>
                    <div class="d-flex gap-2">
                      <a href="{{ route('task.show', $task) }}" class="btn btn-sm btn-primary">show</a>
                      <a href="{{ route('task.edit', $task) }}" class="btn btn-sm btn-secondary">edit</a>
                      <button href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $task->id }}">delete</button>
                      @include('pages.task._modal_delete')
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-end">
          {{ $tasks->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection