@extends('layout.admin')

@section('content')
    <h1>All Orders</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Placed At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($orders as $order)
           <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>Rs: {{ $order->total }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn-view-order">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
