@extends('layouts.app')
@section ('title')Drugs
@endsection
@section('content')
<div>
    <form action="{{ route('drug.store') }}" method="post">
        @csrf
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>

        <div>
        <label for="drug_content">Content</label>
        <textarea name="drug_content" class="form-control" id="drug_content" placeholder="Content"></textarea>
        </div>

        <div>
        <label for="image">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection