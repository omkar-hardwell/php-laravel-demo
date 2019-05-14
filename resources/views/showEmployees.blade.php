@extends('master')
@section('content')
<div class="container">
    <h1>Employee Detail</h1>
    <hr />
    <span><a href="{{url('crud/add_employee')}}" class="btn btn-success">Add Employee</a></span>
    <br /><br />
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Joining date</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Salary</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee['employee_id']}}</td>
                <td>{{$employee['emp_name']}}</td>
                <td>{{$employee['name']}}</td>
                <td>{{$employee['date_of_joining']}}</td>
                <td>{{$employee['gender']}}</td>
                <td>{{$employee['address']}}</td>
                <td>{{$employee['salary']}}</td>
                <td><a href="{{url('crud/edit_employee', $employee['employee_id'])}}" class="btn btn-warning">Edit</a></td>
                <td><a href="{{url('crud/delete_employee', $employee['employee_id'])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
