@extends('layouts.app')
@section ('title', 'meds')
@section('content')
    <div class="form-group">
        <form action="{{ route('medicineList.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search Products">
            <button type="submit">Search</button>
        </form>
        @if (count($medicines ?? []) > 0)
            <ul>
                @foreach($medicines as $medicine)
                    <div class="mb-1">
                        <a class="text-dark" href="{{ route('medicineList.show', $medicine->id)}}">{{$medicine->title}}</a>
                    </div>
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
    </div>

    

@endsection