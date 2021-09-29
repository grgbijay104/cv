@extends('layouts.templates.show')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <h6>School:</h6>{{ $item->school }}
        </div>

        <div class="col-md-12 form-group">
            <h6>Start:</h6>{{ $item->start }}
        </div>

        <div class="col-md-12 form-group">
            <h6>End</h6>{{ $item->end??'Present' }}
        </div>

        <div class="col-md-12 form-group">
            <h6>GPA:</h6>{{ $item->gpa }}
        </div>

        <div class="col-md-12 form-group">
            <h6>Major:</h6>{{ $item->major }}
        </div>
    </div>
@stop
