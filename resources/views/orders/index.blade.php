@extends('layout.app')

@section('title', 'Orders')

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-success" role="button" href="{{ route('orders.create') }}"> Create Order</a>

    <table class="table table-bordered mt-3">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Product ID</th>
            <th>Action</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->product_id }}</td>
                <td>
                    <form action="{{ route('orders.destroy',$order) }}" method="POST">
                        <a type="button" class="btn btn-info" href="{{ route('orders.show',$order) }}">Show</a>
{{--                        <a type="button" class="btn btn-warning" href="{{ route('orders.edit',$order) }}">Edit</a>--}}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{$orders->links()}}

@endsection
