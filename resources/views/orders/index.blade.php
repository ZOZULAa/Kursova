@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Мої замовлення</h1>
    @foreach($orders as $order)
        <div>
            <h2>Замовлення #{{ $order->id }}</h2>
            @foreach($order->items as $item)
                <p>{{ $item->itemable->name }} - {{ $item->quantity }}</p>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
