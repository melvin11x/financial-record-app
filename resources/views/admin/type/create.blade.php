@extends('layout')

@section('page.title')
    Type - Create
@endsection

@section('title')
    Create Type
@endsection

@section('content')
    <form novalidate action="{{ route('system.types.store') }}" method="POST" class="form">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="name">name</label>
                <input type="text" class="@error('name') is-invalid @enderror" id="name"
                       name="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Create Type</button>
        <a href="{{ route('page.types.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
