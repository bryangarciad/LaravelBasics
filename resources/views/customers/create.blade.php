@extends('layout')
@section('title', 'Customers')
@section('content')
    <h1>Add new Customer</h1>
    <form action="/customers" method="POST" enctype="multipart/form-data">
        @include('customers.form')
        <button type='submit'>Add Customer</button>
    </form>
@endsection
