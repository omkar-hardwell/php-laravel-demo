@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Add Employee</h1>
    <hr />
    <form method="post" action="{{url('crud/employee')}}">
        <div class="form-group row">
            {{csrf_field()}}
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Employee Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Name" name="name">
            </div>
            <br /><br />

            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Department</label>
            <div class="col-sm-10">
                <select name="department_id" class="form-control form-control-lg">
                    @foreach($departments as $department)
                        <option value="{{$department['department_id']}}">{{$department['name']}}</option>
                    @endforeach
                </select>
            </div>
            <br /><br />

            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Joining Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" placeholder="Joining Date" id="datepicker" name="date_of_joining">
            </div>
            <br /><br />

            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Gender</label>
            <div class="col-sm-10">
                <input type="radio" name="gender" checked="checked" value="male">Male
                <input type="radio" name="gender" value="female">Female
            </div>
            <br /><br />

            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Address" name="address">
            </div>
            <br /><br />

            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Salary</label>
            <div class="col-sm-10">
                <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Salary" name="salary">
            </div>
            <br /><br />
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
