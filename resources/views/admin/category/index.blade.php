@extends('layout')

@section('page.title')
    Category
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
@endsection

@section('title')
    All Category
@endsection

@section('button')
    <a href="{{ route('page.categories.create') }}" class="btn btn-primary">Add</a>
@endsection


@section('content')
    @if(session('message'))
        <div class="alert alert-{{ session('status') }}">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    @if($categories->isEmpty())
        <div class="not-available">
            Category is not available.
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
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td class="action-container">
                        <a href="{{ route('page.categories.edit', ['category' => $category->id]) }}" class="btn-action btn-edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <form action="{{ route('system.categories.destroy', ['category' => $category->id]) }}" method="POST">
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
