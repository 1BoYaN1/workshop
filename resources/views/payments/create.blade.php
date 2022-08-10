@extends('layouts.app')
@section('content')

    <h1>Payment details</h1>

    <h4 class="text-center"><strong>Grand Total:</strong> ${{ $order->total }}</h4>

    {{--    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create</a>--}}
    <div class="text-center mb-3">

        <form class="d-inline" method="POST" action="{{ route('orders.payments.store', ['order' => $order->id]) }}">
            @csrf
            <button class="btn btn-success" type="submit">Pay</button>
        </form>
    </div>


@endsection


