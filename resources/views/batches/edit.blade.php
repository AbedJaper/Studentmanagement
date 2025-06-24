@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Batch</div>
  <div class="card-body">
    <form action="{{ url('batches/' . $batch->id) }}" method="post">
      @csrf
      @method('PATCH')

      <label>Name</label><br>
      <input type="text" name="name" value="{{ $batch->name }}" class="form-control"><br>

      <label>Course</label><br>
      <select name="course_id" class="form-control">
        @foreach($courses as $id => $name)
          <option value="{{ $id }}" {{ $id == $batch->course_id ? 'selected' : '' }}>
            {{ $name }}
          </option>
        @endforeach
      </select><br>

      <label>Start Date</label><br>
      <input type="date" name="start_date" value="{{ $batch->start_date }}" class="form-control"><br>

      <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
  </div>
</div>
@endsection
