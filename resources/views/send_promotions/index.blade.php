@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Send Promotions</h1>
    <form action="{{ route('send-promotion.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer Name</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">Choose Customer Name</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="promotion_id">Promotion Name</label>
            <select name="promotion_id" id="promotion_id" class="form-control">
                <option value="">Choose Promotion Name</option>
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->id }}">{{ $promotion->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Send Promotion</button>
    </form>
</div>
@endsection
