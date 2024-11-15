@extends('layouts.app')
@section ('title')Edit
@endsection
@section('content')
<div>
    <form  action="{{ route('medicine.update', $medicine->id) }}", method="post">
        @csrf
        @method('patch')
        <div class="mt-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$medicine->title}}">
        </div>

        <div class="mt-3">
        <label for="medicine_content">Content</label>
        <textarea name="medicine_content" class="form-control" id="medicine_content" placeholder="Content">{{$medicine->medicine_content}}</textarea>
        </div>

        <div class="mt-3">
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{$medicine->image}}">
        </div>

        <div class="mt-3">
        <label for="image">Price</label>
        <input type="number" name="price" class="form-control" id="image" placeholder="Price" value="{{$medicine->price}}">
        </div>

        <div class="mt-3">
        <label for="image">In stock</label>
        <input type="number" name="count" class="form-control" id="image" placeholder="Count" value="{{$medicine->count}}">
        </div>

        <div class="form-group">
        <label for="category"> Category </label>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{$category->id == $medicine->category_id ? 'selected' : ''}}>{{$category->title}}</option>
            @endforeach
        </select>
        </div>

        <button type="submit" class="mt-3 btn btn-outline-dark">Update</button>
        
        <div class="mt-3">
            <a class="btn btn-outline-dark" href="{{ route("medicine.show", $medicine->id)}}"> Back </a>
        </div>
        </form>
</div>
@endsection 