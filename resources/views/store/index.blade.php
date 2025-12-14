@extends('layouts.app')

@section('content')
<h1>Available Products</h1>

<div class="grid">
@foreach($items as $item)
    <div class="card">
        <h3>{{ $item->name }}</h3>
        <p>{{ $item->description }}</p>
        <strong>£{{ $item->price }}</strong>
    </div>
@endforeach
</div>

{{ $items->links() }}
@endsection
