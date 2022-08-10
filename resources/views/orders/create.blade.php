@extends('layouts.app')
@section('content')

    <h1>Order details</h1>

    <h4 class="text-center"><strong>Grand Total:</strong> ${{ $cart->total }}</h4>

{{--    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create</a>--}}
    <div class="text-center mb-3">

        <form class="d-inline" method="POST" action="{{ route('orders.store') }}">
            @csrf
            <button class="btn btn-success" type="submit">Confirm Order</button>
        </form>
    </div>

        <div class="table-striped">
            <table class="table table-striped">
                <thead class="thead-light">
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </thead>
                <tbody>
                @foreach($cart->products as $product)
                    <tr>
                        <td class="col-4" style="height: 500px;">
                            <img class="h-100 w-100" src="{{asset($product->images->first()->path) }}" width="100">
                            {{ $product->title }}
                        </td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>${{ $product->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


@endsection

