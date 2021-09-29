@extends('layouts.templates.edit')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="">Hospital Name</label>
            <input type="text" class="form-control" name="hospital_name" value="{{ old('hospital_name',$item->hospital_name) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Worked From</label>
            <input type="date" class="form-control" name="worked_from" value="{{ old('worked_from',$item->worked_from) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Worked To</label>
            <input type="date" class="form-control" name="worked_to" value="{{ old('worked_to',$item->worked_to) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="{{ old('address',$item->address) }}">
        </div>
    </div>
@stop
