@extends('layout')

@section('page.title')
    Type - Edit
@endsection

@section('title')
    Edit Type [{{ $type->name }}]
@endsection

@section('content')
    <form novalidate action="{{ route('system.types.update', ['type' => $type->id]) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="name">name</label>
                <input type="text" class="@error('name') is-invalid @enderror" id="name"
                       name="name" value="{{ old('name', $type->name) }}">
                @error('name')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Update Type</button>
        <a href="{{ route('page.types.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
