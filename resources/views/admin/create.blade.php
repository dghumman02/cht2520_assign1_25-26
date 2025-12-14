@extends('layouts.app')

@section('content')
<h1>Add Product</h1>

<form method="POST" action="/admin/store">
@csrf

<label>Name</label>
<input name="name">

<label>Description</label>
<textarea name="description"></textarea>

<label>Price</label>
<input name="price">

<label>Stock</label>
<input name="stock_quantity">

<label>Category</label>
<input name="category">

<button type="submit">Save</button>
</form>
@endsection
