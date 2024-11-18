@extends('layouts.app')
@section('title', 'meds')

@section('content')
<div class="my-2">
    <form action="{{ route('medicineList') }}" method="GET" class="d-flex align-items-center gap-2 mb-3">
        <select class="form-select" name="category_id" onchange="this.form.submit()">
            <option value=''>Всі</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ ($categ ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
        <input type="text" class="form-control" name="search" placeholder="Search Medicines" value="{{ $search ?? '' }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if (count($medicines ?? []) > 0)
        <div class="container">
            <div class="row">
                @foreach($medicines as $medicine)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 position-relative">
                            <div class="d-flex">
                                <div class="image-container">
                                    <img 
                                        src="{{ $medicine->image }}" 
                                        alt="image" 
                                        class="img-fluid"
                                        style="width: 150px; height: 150px; object-fit: cover;"
                                    >
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('medicineList.show', $medicine->id) }}">{{ $medicine->title }}</a></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ $medicine->category->title ?? 'N/A' }}
                                    </h6>
                                    <p class="card-text">
                                        <strong>Price:</strong> ${{ $medicine->price }}<br>
                                        <strong>Count:</strong> {{ $medicine->count }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('medicineList.show', $medicine->id) }}" 
                               class="btn btn-info btn-sm position-absolute top-0 end-0 m-2"
                               style="opacity: 0; transition: opacity 0.3s;">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No results found.</p>
    @endif
</div>
@endsection

@section('script')
<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseover', () => {
            const btn = card.querySelector('.btn-info');
            if (btn) btn.style.opacity = 1;
        });
        card.addEventListener('mouseout', () => {
            const btn = card.querySelector('.btn-info');
            if (btn) btn.style.opacity = 0;
        });
    });
</script>
@endsection
