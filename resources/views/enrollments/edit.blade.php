@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">Edit Enrollment</div>
  <div class="card-body">
    <form action="{{ url('enrollments/' . $enrollment->id) }}" method="post">
      @csrf
      @method('PATCH')

      <label>Enroll No</label><br>
      <input type="text" name="enroll_no" id="enroll_no" class="form-control" value="{{ $enrollment->enroll_no }}"><br>

      <label>Batch ID</label><br>
      <input type="text" name="batch_id" id="batch_id" class="form-control" value="{{ $enrollment->batch_id }}"><br>

      <label>Student ID</label><br>
      <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $enrollment->student_id }}"><br>

      <label>Join Date</label><br>
      <input type="date" name="join_date" id="join_date" class="form-control" value="{{ $enrollment->join_date }}"><br>

      <label>Fee</label><br>
      <input type="text" name="fee" id="fee" class="form-control" value="{{ $enrollment->fee }}"><br>

      <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
  </div>
</div>
@endsection
