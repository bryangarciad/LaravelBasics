@extends('layout')
@section('title', 'Edit'.$customer->name)
@section('content')
<h1>Edit Customer</h1>
    <form action="/customers/{{ $customer->id }}" method="POST">
        @method('PATCH')
        @include('customers.form')
        <button type='submit'>Edit Customer</button>
    </form>
@endsection