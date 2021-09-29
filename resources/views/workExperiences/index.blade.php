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
                <th>hospital name</th>
                <th>worked from</th>
                <th>worked to</th>
                <th>address</th>
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
                ajax: "{{ route('workExperiences.index') }}",
                columns: [
                    {data: 'id', name: 'DT_RowIndex'},
                    {data: 'hospital_name', name: 'hospital_name'},
                    {data: 'worked_from', name: 'worked_from'},
                    {data: 'worked_to', name: 'worked_to'},
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action'},
                ],
            });
        });
    </script>
@endpush
