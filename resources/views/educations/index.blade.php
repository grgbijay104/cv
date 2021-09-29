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
                <th>school</th>
                <th>start</th>
                <th>end</th>
                <th>gpa</th>
                <th>major</th>
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
                ajax: "{{ route('educations.index') }}",
                columns: [
                    {data: 'id', name: 'DT_RowIndex'},
                    {data: 'school', name: 'name'},
                    {data: 'start', name: 'start'},
                    {data: 'end', name: 'end'},
                    {data: 'gpa', name: 'gpa'},
                    {data: 'major', name: 'major'},
                    {data: 'action', name: 'action'},
                ],
            });
        });
    </script>
@endpush
