@foreach($places as $place)
    <h1>{{$place->id}}</h1>
    <h2>{{$place->name}}</h2>
    <h5>{{$place->customer}}</h5>

  {{--  @php
        $customers=$place->customer;
    @endphp

    @foreach ($customers as $customer)
        {{$customer->name}} ,
    @endforeach--}}

@endforeach
