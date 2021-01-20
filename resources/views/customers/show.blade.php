<h1><a href="/customers/{{ $customer->id}}">{{$customer->name}}</a></h1>
<h1>{{$customer->email}}</h1>
<h1>{{$customer->active}}</h1>


<h1>DELETE?</h1>
<form action="/customers/{{ $customer->id }}" method="POST">
    @method('DELETE')
    <button type='submit'>Edit Customer</button>

    @csrf
</form>

@if($customer->image)
    <img src="{{ asset('storage/' . $customer->image) }}" alt="">
@endif