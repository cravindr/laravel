@foreach($customers as $customer)
    <h1>{{$customer->name}}</h1>
    <h2>{{$customer->mobile}}</h2>
    <h3>{{$customer->address}}</h3>
    <h4>{{$customer->getPlace()}}</h4>
    <h4>{{$customer->getShortCode()}}</h4>

    {{--<h5>Z------------:{{$customer->placed->name}}</h5>--}}
    <h5>Z------------:{{$customer->placed->short_code }}</h5>
    @endforeach
