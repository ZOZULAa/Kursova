@extends('layouts.app')
@section ('title')Drugs
@endsection
@section('content')
    <div>
        <div>{{ $drug->id}}.{{ $drug->title}}</div>
        <div>{{ $drug->drug_content}}</div>
    </div>
    <div>
        <a href="{{ route("drug.edit", $drug->id)}}"> Edit </a>
    </div>
    <div>
        <form action='{{route("drug.delete", $drug->id)}}' method='post'>
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form> 
    </div>
    <div>
        <a href="{{ route("drug.index")}}"> Back </a>
    </div>


@endsection