@extends('layouts.templates.edit')
@section('form_content')
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name',$item->name) }}">
        </div>

        <div class="col-md-12 form-group">
            <label for="">Level</label>
            <select name="level" class="form-control" id="">
                <option value="1" {{ $item->level==1?'selected':'' }}>1</option>
                <option value="2" {{ $item->level==2?'selected':'' }}>2</option>
                <option value="3" {{ $item->level==3?'selected':'' }}>3</option>
                <option value="4" {{ $item->level==4?'selected':'' }}>4</option>
                <option value="5" {{ $item->level==5?'selected':'' }}>5</option>
            </select>
        </div>
    </div>
@stop
