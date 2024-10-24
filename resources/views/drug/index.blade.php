@extends('layouts.app')
@section ('title')Drugs
@endsection
@section('content')
    <div>
        <a href="{{ route('drug.create') }}" ><button type="button" class="my-3 btn btn-outline-dark"> Add </button></a>
    </div>
    <div class="form-group">
        @foreach($drug as $drug)
            <div class="mb-1">
                <a class="text-dark" href="{{ route('drug.show', $drug->id)}}">{{$drug->title}}</a>
            </div>
        @endforeach
    </div>

@endsection