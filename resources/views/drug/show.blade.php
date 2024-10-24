@extends('layouts.app')
@section ('title')Drugs
@endsection
@section('content')
    <div>
        <div class="mt-3">Id: {{ $drug->id}}</div>
        <div class="mt-3">Title: {{ $drug->title}}</div>
        <div class="mt-3">Content: {{ $drug->drug_content}}</div>
    </div>
    <div class="mt-3">
        <a class="btn btn-outline-dark" href="{{ route("drug.edit", $drug->id)}}"> Edit </a>
    </div>
    <div class="mt-3">
        <form action='{{route("drug.delete", $drug->id)}}' method='post'>
            @csrf
            @method('delete')
            <input class="btn btn-outline-danger" type="submit" value="Delete">
        </form> 
    </div>
    <div class="mt-3">
        <a class="btn btn-outline-dark" href="{{ route("drug.index")}}"> Back </a>
    </div>


@endsection