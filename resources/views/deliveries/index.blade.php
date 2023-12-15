@extends('home.base')

@section('content')
@if (session('message'))
    <div style="margin: auto; text-align: center;" class="alert alert-success">{{ session('message') }}</div><br>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{ url('deliveries/create') }}" class="btn btn-primary me-md-2" type="button">
        Add Delivery
    </a>
</div>
    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Items Ordered</th>
                <th>Total Amount</th>
                <th>Phone</th>
                <th>Actions</th>
                </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{ $delivery->id }}</td>
                    <td>{{ $delivery->customer->name }}</td> 
                    <td>{{ $delivery->items_ordered }}</td>
                    <td>{{ $delivery->total_amount }}</td>
                    <td>{{ $delivery->phone }}</td> 
                    <td class="text-center">
                        <a href="{{ url('/deliveries/' . $delivery->id) }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>

@endsection
