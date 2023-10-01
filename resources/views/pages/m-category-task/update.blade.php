@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6>category update</h6>
      </div>
      
      <form method="post" action="{{ route('m_category_task.update', $category) }}">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control {{ !$errors->has('name')?:'is-invalid' }}">
            @error('name')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-sm btn-success">update</button>
        </div>
      </form>
    </div>
  </div>
@endsection