@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">create category</h6>
      </div>

      <form method="post" action="{{ route('m_category_task.store') }}">
        @csrf
        <div class="card-body">
          <div class="form-group mb-3">
            <label for="" class="form-label">name</label>
            <input type="text" name="name" id="name" class="form-control {{ !$errors->has('name')?:'is-invalid' }}" placeholder="Name">
            @error('name')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-sm btn-success">add</button>
        </div>
      </form>
    </div>
  </div>
@endsection