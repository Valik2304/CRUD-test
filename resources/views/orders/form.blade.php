@extends('layout.app')

@section('title', 'Create order')

@section('content')

    <div class="row">

        <div class="pull-right">
            <a class="btn btn-primary mt-3" href="{{ route('orders.index') }}">Back</a>
        </div>

    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          @if(isset($order))
              action="{{ route('orders.update', $order)}}"
          @else
              action="{{ route('orders.store')}}"
          @endif
          class="mt-3">

        @csrf

        @if(isset($order))
            @method('PUT')
        @endif

        <div class="row">

            <div class="col">
                <strong>Product:</strong>
                <select name="product_id">
                        @foreach($products as $product)
                            <option label="{{$product->name}}" value="{{$product->id}}"></option>
                        @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

        </div>
    </form>
@endsection
