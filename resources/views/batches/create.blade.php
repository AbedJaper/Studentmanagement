@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">Add Batch</div>
  <div class="card-body">
    <form action="{{ url('batches') }}" method="post">
      @csrf
      
      <label>Batch Name</label><br>
      <input type="text" name="name" id="name" class="form-control"><br>

      <label>Course</label><br>
      <select name="course_id" id="course_id" class="form-control">
        @foreach ($courses as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
      </select><br>

      <label>Start Date</label><br>
      <input type="date" name="start_date" id="start_date" class="form-control"><br>

      <input type="submit" value="Save" class="btn btn-success"><br>
    </form>
  </div>
</div>
@endsection
