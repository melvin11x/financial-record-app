@extends('layout')

@section('page.title')
    History
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/history.css') }}">
@endsection

@section('title')
    @if($user->isAdmin) All @endif
    History
@endsection

@section('button')
    @if(!$user->isAdmin)
        <a href="{{ route('page.histories.create') }}" class="btn btn-primary">Add</a>
    @endif
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-{{ session('status') }}">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    @if($histories->isEmpty())
        <div class="not-available">
            History is not available.
        </div>
    @else
        <ul class="list">
            @foreach($histories as $history)
                <li>
                    <div class="row align-items-center">
                        <div class="col-6">
                            <p><b>Date:</b> {{ $history->date }}</p>
                            <p><b>Amount:</b> {{ $history->amount }}</p>
                        </div>
                        <div class="col-4">
                            <p><b>Category:</b> {{ $history->category->name }}</p>
                            <p><b>Type:</b> {{ $history->type->name }}</p>
                        </div>
                        <div class="col-2 action-container">
                            <a href="{{ route('page.histories.show', ['history' => $history->id]) }}"
                               class="btn-action btn-info">
                                <i class="fas fa-info-circle"></i>
                            </a>

                            <a href="{{ route('page.histories.edit', ['history' => $history->id]) }}"
                               class="btn-action btn-edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="{{ route('system.histories.destroy', ['history' => $history->id]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-action btn-delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
