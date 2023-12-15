@extends('home.base')

@section('content')
    <h1>
        Create New Customer
    </h1>
    <div class="row">
        <div class="col-md-5">
            <form action="{{ url('customers/create') }}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter name..." class="form-control">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter email..." class="form-control">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter phone..." class="form-control">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary">
                        Add Customer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
