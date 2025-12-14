@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

<form method="POST" action="/admin/{{ $item->id }}">
@csrf
@method('PUT')

<label>Name</label>
<input name="name" value="{{ $item->name }}">

<label>Description</label>
<textarea name="description">{{ $item->description }}</textarea>

<label>Price</label>
<input name="price" value="{{ $item->price }}">

<label>Stock</label>
<input name="stock_quantity" value="{{ $item->stock_quantity }}">

<label>Category</label>
<input name="category" value="{{ $item->category }}">

<button type="submit">Update</button>
</form>
@endsection
