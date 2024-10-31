@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Promotions</h1>
    <ul>
        @foreach($promotions as $promotion)
            <li>{{ $promotion->title }}</li>
        @endforeach
    </ul>
</div>
@endsection
