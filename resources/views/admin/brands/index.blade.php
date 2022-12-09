@extends('admin.adminLayout')
@section('links')
<link rel="stylesheet" href="{{asset('dasboard/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

{{-- <link rel="stylesheet" href="{{asset('dasboard/dist/css/adminlte.min.css')}}"> --}}
@endsection
@section('body')
@extends('admin.nav')
@endsection
@section('content')
<div class="card-body" >

    {!! $dataTable->table([
        'class'=>'dataTable table table-striped table-bordered table-hover'
        ]) !!}

</div>
@endsection
@section('scripts')
<!-- DataTables -->
{!! $dataTable->scripts() !!}

    <script src="{{asset('dasboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('dasboard/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>
    {{-- <script src="cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.mjs"></script> --}}
    <!-- AdminLTE App -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>

@endsection
