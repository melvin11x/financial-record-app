@extends('layout')

@section('page.title')
    Dashboard
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-{{ session('status') }}">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <form action="{{ route('system.updateIncome') }}" method="POST" class="form">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-4">
                <label for="income">Income</label>
            </div>
            <div class="col-8">
                <input type="text" id="income" name="income" value="{{ old('income', $user->income) }}"
                       class="@error('category_id') is-invalid @enderror">
                @error('income')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{--        <div class="row">--}}
        {{--            <div class="col-4">--}}
        {{--                <label for="currency">Currency</label>--}}
        {{--            </div>--}}
        {{--            <div class="col-8">--}}
        {{--                <select id="currency" name="currency">--}}
        {{--                    <option value="Rp." @if(old('currency', $user->currency) == 'Rp.') selected @endif>Rupiah</option>--}}
        {{--                    <option value="$" @if(old('currency', $user->currency) == '$') selected @endif>Dollar</option>--}}
        {{--                </select>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
