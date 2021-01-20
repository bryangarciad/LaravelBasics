@extends('layout')
@section('title', 'Aboutt')

@section('content')
<h1>Contact us</h1>
@if(!session()->has('message'))
    <form action="{{ route('contact.store') }}" method="POST">
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="message">    
        <button type="submit">Submit</button>
        @csrf
    </form>
@endif
@endsection