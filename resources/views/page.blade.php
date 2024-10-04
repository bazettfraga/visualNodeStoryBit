<!-- resources/views/page.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Your value is {{ $value }}!</h1>
    <img src="{{ asset('images/duck.png') }}" alt="Duck Image">
@endsection