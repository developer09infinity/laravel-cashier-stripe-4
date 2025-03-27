@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>Price: ₹{{ number_format($product->price, 2) }}</p>
    <form action="{{ route('product.checkout', $product->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Proceed to Payment</button>
    </form>
</div>
@endsection
