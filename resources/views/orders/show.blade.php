@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Замовлення #{{$order->id}}</h1>
        <div class="card mb-4 shadow-sm" style="border-radius: 10px;">
            <div class="card-body">
                <p><strong>Статус:</strong> Опрацьовується</p>
                <div class="d-flex justify-content-between align-items-center my-3">
                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете скасувати це замовлення?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Скасувати замовлення</button>
                    </form>
                    <span class="text-muted">Створено: {{ $order->created_at->format('d.m.Y H:i') }}</span>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Назва</th>
                            <th>Кількість</th>
                            <th>Ціна</th>
                            <th>Разом</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($order->items as $item)
                        @php
                            $total += $item->itemable->getPrice() * $item->quantity;
                        @endphp
                            <tr>
                                <td>
                                    <img src="{{ $item->itemable->image ?? 'https://via.placeholder.com/100' }}" 
                                         alt="{{ $item->itemable->name }}" class="img-fluid" 
                                         style="max-width: 100px; height: auto;">
                                </td>
                                <td>{{ $item->itemable->title }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->itemable->getPrice() }} грн</td>
                                <td>{{ $item->itemable->getPrice() * $item->quantity }} грн</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <h4>Загальна сума:</h4>
                    <h4>{{ $total }} грн</h4>
                </div>
            </div>
        </div>
</div>
@endsection
