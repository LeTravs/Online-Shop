@extends('home.base')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Order - {{ $order->id }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/orders/delete/' . $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this order?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('message'))
<div class="success">{{ session('message') }}</div>
@endif

<h1>
    Update Order
</h1>

<div class="row">
    <div class="col-md-5">
        <form action="{{ url('orders/' . $order->id) }}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" placeholder="Enter customer name..."
                    class="form-control" value="{{ $order->customer->name }}">
            </div>            
            <div class="form-group mt-2">
                <label for="items_ordered">Items Ordered</label>
                <input type="text" name="items_ordered" id="items_ordered" placeholder="Enter items ordered..."
                    class="form-control" value="{{ $order->items_ordered }}">
                @error('items_ordered')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="total_amount">Total Amount</label>
                <input type="text" name="total_amount" id="total_amount" placeholder="Enter total amount..."
                    class="form-control" value="{{ $order->total_amount }}">
                @error('total_amount')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="order_status">Order Status</label>
                <input type="text" name="order_status" id="order_status" placeholder="Enter order status..."
                    class="form-control" value="{{ $order->order_status }}">
                @error('order_status')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal">
                    Delete
                </button>
                <button class="btn btn-primary" type="submit">
                    Update Order
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
