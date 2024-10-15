@extends('layouts.app')
@section ('title', 'Home page')
@section('content')

<h1> Home page </h1>

@endsection
@section('aside')
    
    @parent

    <p> Доповнюючий текст </p>

@endsection