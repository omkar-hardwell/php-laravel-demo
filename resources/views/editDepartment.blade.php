@extends('master')
@section('content')
<div class="container">
    <h1>Edit Department</h1>
    <hr />
    <form method="post" action="{{action('CRUDDemoController@update_department', $department_id)}}">
        <div class="form-group row">
            {{csrf_field()}}
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Department</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="name" value="{{$department->name}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
