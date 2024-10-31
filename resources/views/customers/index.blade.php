@extends('layouts.app')

@section('content')
<h2>Customers</h2>
<a href="{{ route('customers.create') }}">Add Customer</a>
<ul>
    @foreach ($customers as $customer)
        <li>{{ $customer->name }} - {{ $customer->email }}</li>
    @endforeach
</ul>
@endsection
