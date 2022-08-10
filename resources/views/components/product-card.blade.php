<div class="card">

    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100 card-img-top" src="{{ asset($image->path) }}" height="500">
                </div>
            @endforeach
        </div>
{{--        <a class="carousel-control-prev" href="#carousel{{ $product->id }}" type="button" data-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon" ></span>--}}
{{--        </a>--}}
{{--        <a class="carousel-control-next" href="#carousel{{ $product->id }}" type="button" data-slide="next">--}}
{{--            <span class="carousel-control-next-icon" ></span>--}}
{{--        </a>--}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="card-body">
        <h4 class="text-end"><strong>${{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"> <strong>{{ $product->stock }} left</strong></p>

    @if(isset($cart))
            <p class="card-text">{{ $product->pivot->quantity }} in your cart<strong>(${{ $product->total }})</strong></p>
            <form class="d-inline" method="POST" action="{{ route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart->id ]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Remove From Cart</button>
            </form>
        @else
            <form class="d-inline" method="POST" action="{{ route('products.carts.store', ['product' => $product->id ]) }}">
                @csrf
                <button class="btn btn-success" type="submit">Add to Cart</button>
            </form>
        @endif
    </div>
</div>

