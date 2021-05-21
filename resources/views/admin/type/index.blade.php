@extends('layout')

@section('page.title')
    Type
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/type.css') }}">
@endsection

@section('title')
    All Type
@endsection

@section('button')
    <a href="{{ route('page.types.create') }}" class="btn btn-primary">Add</a>
@endsection


@section('content')
    @if(session('message'))
        <div class="alert alert-{{ session('status') }}">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    @if($types->isEmpty())
        <div class="not-available">
            Type is not available.
        </div>
    @else
        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->created_at }}</td>
                    <td>{{ $type->updated_at }}</td>
                    <td class="action-container">
                        <a href="{{ route('page.types.edit', ['type' => $type->id]) }}" class="btn-action btn-edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <form action="{{ route('system.types.destroy', ['type' => $type->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn-action btn-delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
