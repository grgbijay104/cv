@extends('layouts.templates.create')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Level</label>
            <select name="level" class="form-control" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
@stop
