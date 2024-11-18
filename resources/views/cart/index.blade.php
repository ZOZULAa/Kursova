@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Ваш Кошик</h1>

    <!-- Cart Items -->
    @if($cartItems->count() > 0)
        <div class="row">
            @foreach($cartItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="p-2 card-body shadow-lg" style="border-radius: 10px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($item->itemable->image)
                                    <img src="{{ $item->itemable->image }}" class="img-fluid rounded-start" alt="{{ $item->itemable->title }}" style="object-fit: cover; height: 100%; width: 100%; border-radius: 10px;">
                                @else
                                    <img src="https://wall31.com/home/catalog_products/item_8245/image/MTY4Nzk3MTYxNC4yNzE1.jpg" class="img-fluid rounded-start" alt="No Image Available" style="object-fit: cover; height: 100%; width: 100%; border-radius: 10px;">
                                @endif
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->itemable->title }}</h5>
                                    <p class="card-text"><strong>Quantity:</strong> {{ $item->quantity }} шт.</p>
                                    <p class="card-text"><strong>Price:</strong> {{ $item->itemable->getPrice() }} грн.</p>
                                    <p class="card-text"><strong>Total:</strong> {{ $item->itemable->getPrice() * $item->quantity }} грн.</p>
                                    
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->itemable_id }}">
                                        <button class="btn btn-outline-danger btn-sm w-100" type="submit">Видалити</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between mt-4">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100" type="submit">Очистити кошик</button>
            </form>
            <form action="{{ route('orders.create') }}" method="POST">
                @csrf
                <button class="btn btn-success w-100" type="submit">Оформити замовлення</button>
            </form>
        </div>

    @else
        <p class="text-center">Ваш кошик порожній.</p>
    @endif
</div>
@endsection
