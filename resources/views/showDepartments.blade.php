@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Department Detail</h1>
    <hr />
    <span><a href="{{url('crud/add_department')}}" class="btn btn-success">Add Department</a></span>
    <br /><br />
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{$department['department_id']}}</td>
                <td>{{$department['name']}}</td>
                <td><a href="{{url('crud/edit_department', $department['department_id'])}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{url('crud/delete_department', $department['department_id'])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
