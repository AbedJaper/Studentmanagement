@extends('layout')

@section('content')
<div class="card">
  <div class="card-header">Enrollment Details</div>
  <div class="card-body">
    <h5 class="card-title">Enrollment Number: {{ $enrollment->enroll_no }}</h5>

    <p class="card-text">Batch: {{ $enrollment->batch->name ?? 'N/A' }}</p>
    <p class="card-text">Student: {{ $enrollment->student->name ?? 'N/A' }}</p>
    <p class="card-text">Join Date: {{ $enrollment->join_date }}</p>
    <p class="card-text">Fee: {{ $enrollment->fee }}</p>
  </div>
</div>
@endsection
