@extends('themes.theme1');

@section('css')
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


<div class="row">
    <div class="col-lg-4 offset-lg-4">
        <form action="{{URL::to('saveplace')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Short Code</label>
                <input type="text" name="short_code" class="form-control" placeholder="Please Enter Short Code eg. PER">
            </div>
            <div class="form-group">
                <label>Place Name</label>
                <input type="text"  name="name" class="form-control" placeholder="Please Enter Place Name eg. Perumagalru">
            </div>
            <div class="form-group">
                <button name="save" class="btn btn-primary">Save</button>

            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('asset/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection


