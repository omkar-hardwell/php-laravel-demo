@extends('master')
@section('content')
    <div class="container">
        <h1>Home</h1>
        <hr />

        <span><a href="{{url('crud/departments')}}">Department</a></span>
        <br /><br />

        <span><a href="{{url('crud/employees')}}">Employee</a></span>
    </div>
@endsection
