@extends('layouts.templates.show')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <h6>Hospital Name:</h6>{{ $item->hospital_name }}
        </div>

        <div class="col-md-12 form-group">
            <h6>Worked From:</h6>{{ $item->worked_from }}
        </div>

        <div class="col-md-12 form-group">
            <h6>Worked To:</h6>{{ $item->worked_to }}
        </div>

        <div class="col-md-12 form-group">
            <h6>Address:</h6>{{ $item->address }}
        </div>
    </div>
@stop
