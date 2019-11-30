@extends('themes.adminlte')
@section('customer-menu','active')
@section('menu-open-customer','menu-open')
@section('customer-register','active')
@section('customer-register-color','text-info')
@section('breadcrumb','Register Customer')
@section('title','Register Customer')
@section('content')
    <div class="row">
        @include('pawn.bootstrap')
        @include('pawn.button')
        @include('pawn.form')
        @include('pawn.row')
        @include('pawn.script')
    </div>
@endsection
@section('cssfile')
    <script src="{{asset('asset/DataTables/jQuery-3.3.1/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('asset/select2/dist/css/select2.min.css')}}">
@endsection
@section('script')
    <script src="{{asset('asset/select2/dist/js/select2.min.js')}}"></script>

    <script>



    </script>


@endsection

