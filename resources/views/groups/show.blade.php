@extends('layout.app')

@section('title', 'Show group ' . $group->name)

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('groups.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $group->name }}
            </div>

            <div class="form-group">
                <strong>Temperature:</strong>
                {{ $group->temp }}
            </div>

            <div class="form-group">
                <strong>Updated:</strong>
                {{ $group->updated_at->format('d/m/y H:i:s') }}
            </div>
        </div>

        <form action="{{ route('groups.destroy',$group) }}" method="POST" class="mt-3">
            <a type="button" class="btn btn-warning" href="{{ route('groups.edit',$group) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

    </div>
@endsection
