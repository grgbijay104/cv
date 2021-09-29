@extends('layouts.templates.show')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <h6>Name:</h6>{{ $item->name }}
        </div>

        <div class="col-md-12 form-group">
            <h6>Level:</h6>{{ $item->level }}
        </div>

    </div>
@stop
