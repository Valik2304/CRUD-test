@extends('layout.app')

@section('title', isset($order) ? 'Update ' . $order->id : 'Create order')

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
                <strong>Id Product:</strong>
                <input type="text" name="prod_id"
                       value="{{isset($order) ? $order->prod_id : null}}"
                       class="form-control" aria-label="prod_id" placeholder="ID...">
            </div>

            <div class="col">
                <strong>Date:</strong>
                <input type="text" name="datetime"
                       value="{{isset($order) ? $order->datetime : null}}"
                       class="form-control" aria-label="datetime" placeholder="Date...">
            </div>

           <div class="row">
               <div class="col mt-3">
                   <button type="submit" class="btn btn-success">Submit</button>
               </div>
           </div>

        </div>
    </form>
@endsection
