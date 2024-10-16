@extends('layouts.app')
@section ('title')Drugs
@endsection
@section('content')
    <div>
        <a href="{{ route('drug.create') }}"> Add </a>
    </div>
    <div class="form-group">
        @foreach($drug as $drug)
            <div>
                <a href="{{ route('drug.show', $drug->id)}}">{{ $drug->id}}.{{$drug->title}}</a>
            </div>
        @endforeach
    </div>

@endsection