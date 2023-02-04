@extends('layout.app')

@section('title', isset($group) ? 'Update ' . $group->name : 'Create group')

@section('content')

    <div class="row">

        <div class="pull-right">
            <a class="btn btn-primary mt-3" href="{{ route('groups.index') }}">Back</a>
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
          @if(isset($group))
              action="{{ route('groups.update', $group)}}"
          @else
              action="{{ route('groups.store')}}"
          @endif
          class="mt-3">

        @csrf

        @if(isset($group))
            @method('PUT')
        @endif

        <div class="row">
            <div class="col">
                <strong>Name:</strong>
                <input type="text" name="name"
                       value="{{isset($group) ? $group->name : null}}"
                       class="form-control" aria-label="name" placeholder="Name...">
            </div>

            <div class="col">
                <strong>Temp:</strong>
                <input type="text" name="temp"
                       value="{{isset($group) ? $group->temp : null}}"
                       class="form-control" aria-label="temp" placeholder="Temp...">
            </div>

           <div class="row">
               <div class="col mt-3">
                   <button type="submit" class="btn btn-success">Submit</button>
               </div>
           </div>

        </div>
    </form>
@endsection
