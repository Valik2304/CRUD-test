@extends('layout.app')

@section('title', isset($product) ? 'Update ' . $product->name : 'Create product')

@section('content')

    <div class="row">

        <div class="pull-right">
            <a class="btn btn-primary mt-3" href="{{ route('products.index') }}">Back</a>
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
          @if(isset($product))
              action="{{ route('products.update', $product)}}"
          @else
              action="{{ route('products.store')}}"
          @endif
          class="mt-3">

        @csrf

        @if(isset($product))
            @method('PUT')
        @endif

        <div class="row">
            <div class="col">
                <strong>Name:</strong>
                <input type="text" name="name"
                       value="{{isset($product) ? $product->name : null}}"
                       class="form-control" aria-label="name" placeholder="Name...">
            </div>

            <div class="col">
                <strong>Cost:</strong>
                <input type="text" name="cost"
                       value="{{isset($product) ? $product->cost : null}}"
                       class="form-control" aria-label="cost" placeholder="Cost...">
            </div>

            <div class="col">
                <strong>Price:</strong>
                <input type="text" name="price"
                       value="{{isset($product) ? $product->price : null}}"
                       class="form-control" aria-label="price" placeholder="Price..">
            </div>

            <div class="col">
                <strong>Group:</strong>
                <input type="text" name="group"
                       value="{{isset($product) ? $product->group : null}}"
                       class="form-control" aria-label="group" placeholder="Group...">
            </div>

           <div class="row">
               <div class="col mt-3">
                   <button type="submit" class="btn btn-success">Submit</button>
               </div>
           </div>

        </div>
    </form>
@endsection
