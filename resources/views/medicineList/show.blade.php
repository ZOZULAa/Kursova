@extends('layouts.app')
@section ('title')Medicine
@endsection
@section('content')
    <div>
        <div class="mt-3">Title: {{ $medicines->title}}</div>
        <div class="mt-3">Content: {{ $medicines->medicine_content}}</div>
        <div class="mt-3">Price: {{ $medicines->price}} грн.</div>
        <div class="mt-3">In stock: {{ $medicines->count}} шт.</div>
        <div class="mt-3">Category: {{ $medicines->category->title ?? ""}}</div>
    </div>
    <div class="mt-3">
        <a class="btn btn-outline-dark" href="{{ route("medicineList.index")}}"> Back </a>
    </div>


@endsection