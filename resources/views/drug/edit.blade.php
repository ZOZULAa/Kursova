@extends('layouts.app')
@section ('title')Drugs
@endsection
@section('content')
<div>
    <form action="{{ route('drug.update', $drug->id) }}", method="post">
        @csrf
        @method('patch')
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$drug->title}}">
        </div>

        <div>
        <label for="drug_content">Content</label>
        <textarea name="drug_content" class="form-control" id="drug_content" placeholder="Content">{{$drug->drug_content}}</textarea>
        </div>

        <div>
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{$drug->image}}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection 