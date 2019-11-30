@extends('themes.adminlte');
{{--@include('place.edit')--}}

@section('customer-menu','active')
@section('menu-open-customer','menu-open')
@section('customer-list','active')
@section('customer-list-color','text-info')
@section('breadcrumb','Customer List')
@section('title','Customer List')

@section('css')
    <link href="{{asset('asset/DataTables/datatables.min.css')}}">
    <link href="{{asset('asset/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('failed'))
            <div class="alert alert-danger">
                {{session('faild')}}
            </div>
        @endif
    </div>

    <div class="col-lg-12">
        <table id="place" class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Mobile</th>
                <th>Place</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{asset('asset/DataTables/jQuery-3.3.1/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('asset/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('asset/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.js')}}"></script>
    {{--<script src="{{asset('asset/bootstrap/js/bootstrap.min.js')}}"></script>--}}

    <script>
        $(document).ready(function () {
            var table = $('#place').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('serversideCustomer') }}",

                "columns": [
                    {"data": "id"},
                    {"data": "code"},
                    {"data": "name"},
                    {"data": "father_name"},
                    {"data": "mobile"},
                    {"data": "placed.name"}
                ],

                "columnDefs": [{
                    "targets": 6,
                    "data": null,
                    "defaultContent": "<button id='btnedit' class='btn btn-info btn-sm'>Edit</button>&nbsp;" +

                        "<button id='btndelete' class='btn btn-danger btn-sm'>Delete</button>"
                }]
            });

            $('#place tbody').on('click', '#btnedit', function () {
                var data = table.row($(this).parents('tr')).data();
                Edit(data.id);
            });


            $('#place tbody').on('click', '#btndelete', function () {
                var data = table.row($(this).parents('tr')).data();
                Delete(data.id,data.name);
            });
        });


        function Delete(id,name) {
            var r = confirm("Do you want to delete this record ? "+name);
            if (r == true) {
                var url = "{{ URL::to('customer/delete') }}";
                $.post(url, {"_token": "{{ csrf_token() }}", id: id}, function (data) {

                    if (data == 1) {
                        window.location.href = "{{ URL::to('customer') }}";
                    }
                });
            }
        }

        function Edit(id) {
            var url = "{{ URL::to('customer/assignid') }}";
            $.post(url, {"_token": "{{ csrf_token() }}", id: id}, function (data) {

                if (data == 1) {
                    window.location.href = "{{ URL::to('customer/edit') }}";
                }
            });
        }


    </script>


@endsection


