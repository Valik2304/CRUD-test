@extends('layout.app')

@section('title', 'Show order ' . $order->id)

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $order->id }}
            </div>

            <div class="form-group">
                <strong>Product ID:</strong>
                {{ $order->product_id }}
            </div>

            <div class="form-group">
                <strong>Created:</strong>
                {{ $order->created_at->format('d/m/y H:i:s') }}
            </div>

            <div class="form-group">
                <strong>Updated:</strong>
                {{ $order->updated_at->format('d/m/y H:i:s') }}
            </div>
        </div>

        <form action="{{ route('orders.destroy',$order) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

    </div>
@endsection
