@extends('themes.adminlte');
@include('place.edit')

@section('place-menu','active')
@section('menu-open-place','menu-open')
@section('place-list','active')
@section('place-list-color','text-info')
@section('breadcrumb','Place List')
@section('title','Place List')

@section('css')
    <link href="{{asset('asset/DataTables/datatables.min.css')}}">
    <link href="{{asset('asset/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif



    @if(session('faliled'))
        <div class="alert alert-danger">
            {{session('faliled')}}
        </div>
    @endif


    <div class="col-lg-12">
        <table id="place" class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Short Code</th>
                <th>Name</th>
                <th>Status</th>
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
                "ajax": "{{ URL::to('serversideplace') }}",

                "columns": [
                    {"data": "id"},
                    {"data": "short_code"},
                    {"data": "name"},
                    {"data": "status"}],

                "columnDefs": [{
                    "targets": 4,
                    "data": null,
                    "defaultContent": "<button id='btnedit' class='btn btn-info btn-sm'>Edit</button>&nbsp;" +
                        "<button id='btnupdatesess' class='btn btn-info btn-sm'>Edit Sess</button>&nbsp;" +
                        "<button id='btndelete' class='btn btn-danger btn-sm'>Delete</button>"
                }]
            });

            $('#place tbody').on('click', '#btnedit', function () {
                var data = table.row($(this).parents('tr')).data();
                Edit(data.id);
            });

            $('#place tbody').on('click', '#btnupdatesess', function () {
                var data = table.row($(this).parents('tr')).data();
                /*console.log(data.name);*/
                Updatesess(data.id);
            });

            $('#place tbody').on('click', '#btndelete', function () {
                var data = table.row($(this).parents('tr')).data();
                Delete(data.id);
            });
        });

        function Edit(id) {
            $.post("{{ URL::to('editplace') }}",{ "_token": "{{ csrf_token() }}", id:id }, function (data) {

                var json = $.parseJSON(data);

                /*this method is used for data with relationship*/

                /*console.log(json.customer);
                $.each(json.customer,function (k,v) {
                    console.log(v.name)
                });*/

                $('#short_code').val(json.short_code);
                $('#name').val(json.name);
               $('#placeedit').modal('show');
            });
        }

        function Delete(id) {
           var url = "{{ URL::to('editplace1') }}";
           window.location.href = url+'/'+id+'/';
        }

    function Updatesess(id) {
        var url = "{{ URL::to('editsess') }}";
           $.post(url,{"_token": "{{ csrf_token() }}", id:id },function (data) {

               if(data==1)
               {
                 window.location.href= "{{ URL::to('place/update') }}";
               }
           });
        }



    </script>


@endsection


