@extends('layout')

@section('page.title')
    Category - Edit
@endsection

@section('title')
    Edit Category [{{ $category->name }}]
@endsection

@section('content')
    <form novalidate action="{{ route('system.categories.update', ['category' => $category->id]) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="name">name</label>
                <input type="text" class="@error('name') is-invalid @enderror" id="name"
                       name="name" value="{{ old('name', $category->name) }}">
                @error('name')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Update Category</button>
        <a href="{{ route('page.categories.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
