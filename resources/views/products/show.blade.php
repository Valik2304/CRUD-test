@extends('layout.app')

@section('title', 'Show product ' . $product->name)

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>

            <div class="form-group">
                <strong>Cost:</strong>
                {{ $product->cost }}
            </div>

            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>

            <div class="form-group">
                <strong>Group:</strong>
                {{ $product->group }}
            </div>

            <div class="form-group">
                <strong>Created:</strong>
                {{ $product->created_at->format('d/m/y H:i:s') }}
            </div>

            <div class="form-group">
                <strong>Updated:</strong>
                {{ $product->updated_at->format('d/m/y H:i:s') }}
            </div>
        </div>

        <form action="{{ route('products.destroy',$product) }}" method="POST" class="mt-3">
            <a type="button" class="btn btn-warning" href="{{ route('products.edit',$product) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

    </div>
@endsection
