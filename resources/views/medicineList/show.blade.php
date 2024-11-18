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
                    <img src="https://wall31.com/home/catalog_products/item_8245/image/MTY4Nzk3MTYxNC4yNzE1.jpg" class="img-fluid rounded-start" alt="No Image Available" style="object-fit: cover; height: 100%; max-width: 100%; border-radius: 10px;">
                @endif
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $medicines->title }}</h5>
                    <p class="card-text"><strong>Content:</strong> {{ $medicines->medicine_content }}</p>
                    <p class="card-text"><strong>Price:</strong> {{ $medicines->price }} грн.</p>
                    <p class="card-text"><strong>In Stock:</strong> {{ $medicines->count }} шт.</p>
                    <p class="card-text"><strong>Category:</strong> {{ $medicines->category->title ?? "N/A" }}</p>
                    
                    <div class="d-flex gap-3 mt-4">
                        <a class="btn btn-outline-dark" href="{{ route('medicineList.index') }}">Back to Medicine List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3">Add to Cart</h5>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $medicines->id }}">

                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <label for="quantity" class="me-2"><strong>Quantity:</strong></label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $medicines->count }}" class="form-control w-50" required>
                        </div>

                        <button type="submit" class="btn btn-outline-primary w-100">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
