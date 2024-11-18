@extends('layouts.app')
@section ('title') Edit @endsection

@section('content')
<div>
    <form action="{{ route('medicine.update', $medicine->id) }}" method="post">
        @csrf
        @method('patch')
        
        <div class="mt-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title', $medicine->title) }}">
            
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <label for="medicine_content">Content</label>
            <textarea name="medicine_content" class="form-control" id="medicine_content" placeholder="Content">{{ old('medicine_content', $medicine->medicine_content) }}</textarea>
            
            @error('medicine_content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ old('image', $medicine->image) }}">
            
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Price" value="{{ old('price', $medicine->price) }}">
            
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <label for="count">In stock</label>
            <input type="number" name="count" class="form-control" id="count" placeholder="Count" value="{{ old('count', $medicine->count) }}">
            
            @error('count')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="category">Category</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $medicine->category_id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="mt-3 btn btn-outline-dark">Update</button>
        
        <div class="mt-3">
            <a class="btn btn-outline-dark" href="{{ route('medicine.show', $medicine->id) }}">Back</a>
        </div>
    </form>
</div>
@endsection
