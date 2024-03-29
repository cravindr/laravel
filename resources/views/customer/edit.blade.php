@inject('places', 'App\Http\Controllers\PlaceController')
@extends('themes.adminlte')

@section('customer-menu','active')
@section('menu-open-customer','menu-open')
@section('customer-list','active')
@section('customer-list-color','text-info')
@section('breadcrumb','Update Customer')
@section('title','Update Customer')


@section('content')
    <div class="row">

        <div class="col-lg-5 offset-2">
            {{--Alert Message Print start--}}
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
            {{--Alert Message Print End--}}
            <form action="{{URL::to('customer/update')}}" method="post">
                @csrf
                <di class="form-group">
                    <label>Name</label>
                    <input type="hidden" value="{{$customer->id}}"  name="id" >
                    <input type="text" value="{{$customer->name}}" class="form-control" name="name" placeholder="Enter Name">
                </di>
                <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" value="{{$customer->father_name}}" class="form-control" name="father_name" placeholder="Enter Father Name">
                </div>
                <div class="form-group">
                    <label>Family Name</label>
                    <input type="text" value="{{$customer->family_name}}" class="form-control" name="family_name" placeholder="Enter Family Name">
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" value="{{$customer->mobile}}" class="form-control" name="mobile" placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" value="{{$customer->address}}" class="form-control" name="address" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>Place</label>
                    {{--<input type="text" value="{{$customer->name}}" class="form-control" name="place" placeholder="Enter Place">--}}

                    <select id="place" name="place" class="form-control" placeholder="Select Place">
                        @foreach($places->getPlace() as $place )
                            <option value="{{$place->id}}">{{$place->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Refer.Name</label>
                    <input type="text" value="{{$customer->referer_name}}" class="form-control" name="referer_name" placeholder="Enter Ref.Name">
                </div>
                <div class="form-group">
                    <label>Referer Mobile</label>
                    <input type="text" value="{{$customer->referer_mobile}}" class="form-control" name="referer_mobile" placeholder="Enter Referer Mobile">
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" value="{{$customer->remerks}}" class="form-control" name="remarks" placeholder="Enter Remarks">
                </div>


                <div class="form-group">
                    <button class="btn btn-primary"> Update</button>
                </div>


            </form>

        </div>
    </div>

@endsection

@section('cssfile')
    <script src="{{asset('asset/DataTables/jQuery-3.3.1/jquery-3.3.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('asset/select2/dist/css/select2.min.css')}}">
@endsection
@section('script')
    <script src="{{asset('asset/select2/dist/js/select2.min.js')}}"></script>

    <script>
        $("#place").select2({
            placeholder: "Select a Place",
            allowClear: true
        });
        $('#place').val({{$customer->place}})
        $('#place').trigger('change');
    </script>


@endsection

