@extends('layout')

@section('page.title')
    History - Create
@endsection

@section('title')
    Create History
@endsection

@section('content')
    <form novalidate action="{{ route('system.histories.store') }}" method="POST" class="form">
        @csrf

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="category_id">Category</label>
                <select class="@error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if(old('category_id') == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="type_id">Type</label>
                <select class="@error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                    <option value="">Select Type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" @if(old('type_id') == $type->id) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="date">Date</label>
                <input type="date" class="@error('date') is-invalid @enderror" id="date" name="date"
                       value="{{ old('date') }}">
                @error('date')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="amount">Amount</label>
                <input type="number" class="@error('amount') is-invalid @enderror" id="amount"
                       name="amount" value="{{ old('amount', 0) }}">
                @error('amount')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 mb-3">
                <label for="note">Note</label>
                <textarea rows="10" class="@error('note') is-invalid @enderror" id="note"
                          name="note">{{ old('note') }}</textarea>
                @error('note')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Create History</button>
        <a href="{{ route('page.histories.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
