@extends('layouts.app')
@section ('title')Create
@endsection
@section('content')
<div>
    <form action="{{ route('medicine.store') }}" method="post">
        @csrf
        <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>

        <div class="mt-3">
        <label for="medicine_content">Content</label>
        <textarea name="medicine_content" class="form-control" id="medicine_content" placeholder="Content"></textarea>
        </div>

        <div class="mt-3">
        <label for="price">Price</label>
        <input type="float" name="price" class="form-control" id="price" placeholder="Price">
        </div>

        <div class="mt-3">
        <label for="count">Count</label>
        <input type="int" name="count" class="form-control" id="count" placeholder="Count">
        </div>

        <div class="form-group">
        <label for="category"> Category </label>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{$category->title}}</option>
            @endforeach
        </select>
        </div>

        <div class="mt-3">
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image">
        </div>

        <button type="submit" class="mt-3 btn btn-outline-dark mt-3">Create</button>
        
        <div>
            <a class="mt-3 btn btn-outline-dark" href="{{ route("medicine.index")}}"> Back </a>
        </div>
        </form>
</div>
@endsection