@extends('adminlte::page')
@section('css')
    @stack('styles')
@stop
@section('title', 'Show '.$title)
@section('content_header')
    <h1>View {{$title}}</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>

                        <div class="card-body">
                            <h4>Basic Info</h4>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <h6>Name:</h6>{{ $item->name }}
                                </div>

                                <div class="col-md-12 form-group">
                                    <h6>Email:</h6>{{ $item->email }}
                                </div>

                                <div class="col-md-12 form-group">
                                    <h6>Phone:</h6>{{ $item->phone }}
                                </div>

                                <div class="col-md-12 form-group">
                                    <h6>Gender:</h6>{{ $item->gender }}
                                </div>
                            </div>

                            <hr>
                            <h4>Education</h4>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>GPA</th>
                                    <th>Major</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item->educations as $education)
                                    <tr>
                                        <td>{{ $education->school }}</td>
                                        <td>{{ $education->start }}</td>
                                        <td>{{ $education->end??'Present' }}</td>
                                        <td>{{ $education->gpa }}</td>
                                        <td>{{ $education->major }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <hr>
                            <h4>Skills</h4>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Level</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item->skills as $skill)
                                    <tr>
                                        <td>{{ $skill->name }}</td>
                                        <td>{{ $skill->level }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <hr>
                            <h4>Work Experiences</h4>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Hospital Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item->workExperiences as $wp)
                                    <tr>
                                        <td>{{ $wp->hospital_name }}</td>
                                        <td>{{ $wp->worked_from }}</td>
                                        <td>{{ $wp->worked_to??'Present' }}</td>
                                        <td>{{ $wp->address }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            <a href="javascript:history.back();" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    @stack('scripts')
    <script>
        jQuery(document).ready(function () {
            $('#form input').attr('readonly', true);
            $('#form select').attr('disabled', true);
        });
    </script>
@stop
