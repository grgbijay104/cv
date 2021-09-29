@extends('layouts.templates.index')

@section('title', 'Working Experience')

@section('content_header')
    <h1>Working Experience</h1>
@stop

@push('styles')

@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table" id="data-table">
            <thead>
            <tr class="text-left text-capitalize">
                <th>#id</th>
                <th>name</th>
                <th>level</th>
                <th>action</th>
            </tr>
            </thead>

        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('skills.index') }}",
                columns: [
                    {data: 'id', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'level', name: 'level'},
                    {data: 'action', name: 'action'},
                ],
            });
        });
    </script>
@endpush
