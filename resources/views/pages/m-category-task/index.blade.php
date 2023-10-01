@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">categories list</h6>
      </div>

      {{-- flash message --}}
      @include('components.alert')

      <div class="card-body">
        <a href="{{ route('m_category_task.create') }}" class="btn btn-sm btn-success mb-4">create category</a>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($m_categories as $category)
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>
                    <div class="d-flex gap-2">
                      <a href="{{ route('m_category_task.edit', $category) }}" class="btn btn-sm btn-secondary">edit</a>
                      <button href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $category->id }}">delete</button>
                      @include('pages.m-category-task._modal_delete')
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-end">
          {{ $m_categories->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection