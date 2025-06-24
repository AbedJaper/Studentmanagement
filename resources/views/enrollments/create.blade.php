@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">Enrollment Page</div>
  <div class="card-body">
    <form action="{{ route('enrollments.store') }}" method="POST">
      @csrf

      <label for="enroll_no">Enroll No</label>
      <input type="text" name="enroll_no" id="enroll_no"
             value="{{ old('enroll_no') }}"
             class="form-control @error('enroll_no') is-invalid @enderror"><br>
      @error('enroll_no')
        <div class="text-danger">{{ $message }}</div>
      @enderror

      <label for="batch_id">Batch</label>
      <select name="batch_id" id="batch_id"
              class="form-control @error('batch_id') is-invalid @enderror">
        <option value="">-- اختر الدفعة --</option>
        @foreach($batches as $batch)
          <option value="{{ $batch->id }}"
            {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
            {{ $batch->name }} ({{ $batch->course->name }})
          </option>
        @endforeach
      </select><br>
      @error('batch_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror

      <label for="student_id">Student</label>
      <select name="student_id" id="student_id"
              class="form-control @error('student_id') is-invalid @enderror">
        <option value="">-- اختر الطالب --</option>
        @foreach($students as $student)
          <option value="{{ $student->id }}"
            {{ old('student_id') == $student->id ? 'selected' : '' }}>
            {{ $student->name }}
          </option>
        @endforeach
      </select><br>
      @error('student_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror

      <label for="join_date">Join Date</label>
      <input type="date" name="join_date" id="join_date"
             value="{{ old('join_date') }}"
             class="form-control @error('join_date') is-invalid @enderror"><br>
      @error('join_date')
        <div class="text-danger">{{ $message }}</div>
      @enderror

      <label for="fee">Fee</label>
      <input type="number" step="0.01" name="fee" id="fee"
             value="{{ old('fee') }}"
             class="form-control @error('fee') is-invalid @enderror"><br>
      @error('fee')
        <div class="text-danger">{{ $message }}</div>
      @enderror

      <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
</div>
@endsection
