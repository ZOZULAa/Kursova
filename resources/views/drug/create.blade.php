@extends('layouts.app')
@section ('title')Create
@endsection
@section('content')
<div>
    <form action="{{ route('drug.store') }}" method="post">
        @csrf
        <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>

        <div class="mt-3">
        <label for="drug_content">Content</label>
        <textarea name="drug_content" class="form-control" id="drug_content" placeholder="Content"></textarea>
        </div>

        <div class="mt-3">
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image">
        </div>

        <button type="submit" class="mt-3 btn btn-outline-dark mt-3">Create</button>
        
        <div>
            <a class="mt-3 btn btn-outline-dark" href="{{ route("drug.index")}}"> Back </a>
        </div>
        </form>
</div>
@endsection