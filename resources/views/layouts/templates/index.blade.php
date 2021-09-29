@extends('adminlte::page')


@section('title', $title??'Title')

@section('content_header')
    <h1>{{$title??'Title'}} List</h1>
@stop

@section('css')
    @stack('styles')
@stop

@section('js')
    @stack('scripts')
@stop


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$title??'Title'}}</h3>
                            @if(!isset($hideCreate))
                                <a href="{{route($route.'create')}}" class="btn btn-primary float-right">
                                    <i class="fa fa-plus"></i>
                                    <span class="kt-hidden-mobile">Add new</span>
                                </a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @yield('index_content')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
