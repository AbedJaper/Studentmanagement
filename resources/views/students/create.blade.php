@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Student Page</div>
  <div class="card-body">
      
      <form action="{{ url('students') }}" method="post">
        {!! csrf_field() !!}

        <label>Name</label></br>
        <input type="text" name="name" class="form-control"></br>

        <label>Address</label></br>
        <input type="text" name="address" class="form-control"></br>

        <label>Mobile</label></br>
        <input type="text" name="mobile" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
      </form>

  </div>
</div>

@stop
