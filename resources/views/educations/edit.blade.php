@extends('layouts.templates.edit')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="">School Name</label>
            <input type="text" class="form-control" name="school" value="{{ old('school',$item->school) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Start</label>
            <input type="date" class="form-control" name="start" value="{{ old('start',$item->start) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">End</label>
            <input type="date" class="form-control" name="end" value="{{ old('end',$item->end) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">GPA</label>
            <input type="text" class="form-control" name="gpa" value="{{ old('gpa',$item->gpa) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Major</label>
            <input type="text" class="form-control" name="major" value="{{ old('major',$item->major) }}">
        </div>
    </div>
@stop
