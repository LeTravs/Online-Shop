@extends('home.base')

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModal">Delete Customer - {{ $customer->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/customers/delete/' . $customer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this customer?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Customer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('message'))
<div class="success">{{ session('message') }}</div>
@endif

<h1>
    Update Customer
</h1>

<div class="row">
    <div class="col-md-5">
        <form action="{{ url('customers/' . $customer->id) }}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter name..." class="form-control"
                    value="{{ $customer->name }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter email..." class="form-control"
                    value="{{ $customer->email }}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="Enter phone..." class="form-control"
                    value="{{ $customer->phone }}">
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </button>
                <button class="btn btn-primary" type="submit">
                    Update Customer
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
