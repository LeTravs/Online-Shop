@extends('home.base')

@section('content')
    <h1>Create Order For Customer</h1>
    <div class="row">
        <div class="col-md-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('orders.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Select Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="items_ordered">Items Ordered</label>
                    <textarea name="items_ordered" id="items_ordered" class="form-control"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" name="total_amount" id="total_amount" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="order_status">Order Status</label>
                    <input type="text" name="order_status" id="order_status" class="form-control">
                </div>
                <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary mt-2" type="submit">Add Order</button>
                </div>
            </form>
        </div>
    </div>
@endsection
