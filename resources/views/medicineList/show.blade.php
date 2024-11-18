@extends('layouts.app')

@section('title') Medicine @endsection

@section('content')
<div class="container mt-4">
    <div class="card mb-3 shadow-sm" style="border: 1px solid #ddd; border-radius: 10px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if($medicines->image)
                    <img src="{{ $medicines->image }}" class="img-fluid rounded-start" alt="{{ $medicines->title }}" style="object-fit: cover; height: 100%; max-width: 100%; border-radius: 10px;">
                @else
                    <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="No Image Available" style="object-fit: cover; height: 100%; max-width: 100%; border-radius: 10px;">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $medicines->title }}</h5>
                    <p class="card-text"><strong>Content:</strong> {{ $medicines->medicine_content }}</p>
                    <p class="card-text"><strong>Price:</strong> {{ $medicines->price }} грн.</p>
                    <p class="card-text"><strong>In Stock:</strong> {{ $medicines->count }} шт.</p>
                    <p class="card-text"><strong>Category:</strong> {{ $medicines->category->title ?? "N/A" }}</p>

                    <!-- Back Button -->
                    <div class="d-flex gap-3 mt-4">
                        <a class="btn btn-outline-dark" href="{{ route('medicineList.index') }}">Back to Medicine List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<center>
    <div class="card text-center mt-4 col-6">
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="item_id" value="{{ $medicines->id }}">

            <div class="d-flex flex-column align-items-center">
                <label for="quantity" class="mb-2"><strong>Quantity:</strong></label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $medicines->count }}" class="form-control w-25 mb-3" required>

                <button type="submit" class="btn btn-outline-primary">Add to Cart</button>
            </div>
        </form>
    </div>
</center>
</div>
@endsection
