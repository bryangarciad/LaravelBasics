@extends('layout')
@section('title', 'Customers')
@section('content')
    <h1>Customers</h1>
    <ul>
        @foreach($customers as $customer)
            <li>{{ $customer->name }} ---{{$customer->company->name}}</li>
        @endforeach
    </ul>
    
    <div class="">
        <div class="">
            {{$customers->links()}}
        </div>
    </div>
   
@endsection