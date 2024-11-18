@extends('layouts.app')

@section ('title') Medicine @endsection

@section('content')
    <!-- Горизонтальна картка препарату -->
    <div class="container mt-4">
        <div class="card mb-3" style="max-width: 100%; border: 1px solid #ddd;">
            <div class="row g-0">
                <div class="col-md-4">
                    @if($medicines->image)
                        <img src="{{$medicines->image}}" class="img-fluid rounded-start" alt="{{ $medicines->title }}">
                    @else
                        <img src="https://via.placeholder.com/250" class="img-fluid rounded-start" alt="No Image Available">
                    @endif
                </div>
                
                <!-- Правий блок: текстові дані препарату -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $medicines->title }}</h5>
                        <p class="card-text">{{ $medicines->medicine_content }}</p>
                        <p class="card-text"><strong>Price:</strong> {{ $medicines->price }} грн.</p>
                        <p class="card-text"><strong>In Stock:</strong> {{ $medicines->count }} шт.</p>
                        <p class="card-text"><strong>Category:</strong> {{ $medicines->category->title ?? "N/A" }}</p>

                        <div class="d-flex gap-3 mt-3">
                            <a class="btn btn-outline-dark" href="{{ route('medicine.edit', $medicines->id) }}">Edit</a>
                            
                            <form action="{{ route('medicine.delete', $medicines->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                            
                            <a class="btn btn-outline-dark" href="{{ route('medicine.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
