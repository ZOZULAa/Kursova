@extends('layouts.app')
@section ('title')Edit
@endsection
@section('content')
<div>
    <form  action="{{ route('drug.update', $drug->id) }}", method="post">
        @csrf
        @method('patch')
        <div class="mt-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$drug->title}}">
        </div>

        <div class="mt-3">
        <label for="drug_content">Content</label>
        <textarea name="drug_content" class="form-control" id="drug_content" placeholder="Content">{{$drug->drug_content}}</textarea>
        </div>

        <div class="mt-3">
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{$drug->image}}">
        </div>

        <button type="submit" class="mt-3 btn btn-outline-dark">Update</button>
        
        <div class="mt-3">
            <a class="btn btn-outline-dark" href="{{ route("drug.index")}}"> Back </a>
        </div>
        </form>
</div>
@endsection 