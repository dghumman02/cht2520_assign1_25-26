@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search products">
    <button type="submit">Search</button>
</form>

<a href="/admin/create" class="btn">Add Product</a>

<table>
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Actions</th>
</tr>

@foreach($items as $item)
<tr>
    <td>{{ $item->name }}</td>
    <td>£{{ $item->price }}</td>
    <td>{{ $item->stock_quantity }}</td>
    <td>
        <a href="/admin/{{ $item->id }}/edit">Edit</a>

        <form method="POST" action="/admin/{{ $item->id }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $items->links() }}
@endsection
