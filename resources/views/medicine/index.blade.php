@extends('layouts.app')
@section ('title')Index
@endsection
@section('content')
    <div>
        <a href="{{ route('medicine.create') }}" ><button type="button" class="my-3 btn btn-outline-dark"> Add </button></a>
    </div>
    <div class="form-group">
        @foreach($medicines as $medicine)
            <div class="mb-1">
                <a class="text-dark" href="{{ route('medicine.show', $medicine->id)}}">{{$medicine->title}}</a>
            </div>
        @endforeach
    
    </div class="form-group">
    <form action="{{ route('medicine') }}" method="GET">
            <select class="form-control" name="category_id">
                <option value=''>Всі</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{($categ ?? '') == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                @endforeach
            </select>
            <input type="text" name="search" placeholder="Search Medicines" value="{{$search ?? ''}}">
            <button type="submit">Search</button>
        </form>
    </div>

@endsection