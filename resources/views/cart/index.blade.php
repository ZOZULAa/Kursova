@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Кошик</h1>
    @foreach($cartItems as $item)
        <div>{{ $item->itemable->title }} - {{ $item->quantity }} шт. </div>
    <div>
        <strong>{{ $item->itemable->name }}</strong> - {{ $item->quantity }} x {{ $item->itemable->getPrice() }} грн.
        <form action="{{ route('cart.remove') }}" method="POST">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->itemable_id }}">
            <button class='btn btn-outline-danger' type="submit">Видалити</button>
        </form>
    </div>
    @endforeach
    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit">Очистити кошик</button>
    </form>
    <form action="{{ route('orders.create') }}" method="POST">
        @csrf
        <button type="submit">Оформити замовлення</button>
    </form>
</div>
@endsection
