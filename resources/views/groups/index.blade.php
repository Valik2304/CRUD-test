@extends('layout.app')

@section('title', 'Groups')

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-success" role="button" href="{{ route('groups.create') }}"> Create Group</a>

    <table class="table table-bordered mt-3">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Temp</th>
            <th>Action</th>
        </tr>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
                <td>{{ $group->temp }}</td>
                <td>
                    <form action="{{ route('groups.destroy',$group) }}" method="POST">
                        <a type="button" class="btn btn-info" href="{{ route('groups.show',$group) }}">Show</a>
                        <a type="button" class="btn btn-warning" href="{{ route('groups.edit',$group) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{$groups->links()}}

@endsection
