@extends('home.base')

@section('content')
    <h1>Create Delivery For Customer</h1>
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

            <form action="{{ route('deliveries.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Select Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="total_amount">Items Ordered</label>
                    <input type="text" name="items_ordered" id="items_ordered" class="form-control">
                </div>

                <div class="form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" name="total_amount" id="total_amount" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>

                <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary mt-2" type="submit">Add Delivery</button>
                </div>
            </form>
        </div>
    </div>
@endsection
