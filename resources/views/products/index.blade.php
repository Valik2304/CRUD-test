@extends('layout.app')

@section('title', 'Products')

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-success" role="button" href="{{ route('products.create') }}"> Create Product</a>

    <table class="table table-bordered mt-3">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Group</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ \Str::limit($product->name, 50) }}</td>
                <td>{{ $product->cost }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->group }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product) }}" method="POST">
                        <a type="button" class="btn btn-info" href="{{ route('products.show',$product) }}">Show</a>
                        <a type="button" class="btn btn-warning" href="{{ route('products.edit',$product) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{$products->links()}}

@endsection
