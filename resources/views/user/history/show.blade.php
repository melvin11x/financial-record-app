@extends('layout')

@section('page.title')
    History - Detail
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/history.css') }}">
@endsection

@section('title')
    History Detail [{{ $history->date }}]
@endsection

@section('button')
    @if(!$user->isAdmin)
        <a href="{{ route('page.histories.create') }}" class="btn btn-primary">Add</a>
    @endif
@endsection

@section('content')
    <div class="detail">
        <div class="row">
            <div class="col-8">
                <table>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td>{{ $history->date }}</td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>:</td>
                        <td>{{ $history->amount }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>:</td>
                        <td>{{ $history->category->name }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>:</td>
                        <td>{{ $history->type->name }}</td>
                    </tr>
                    <tr>
                        <td>Note</td>
                        <td>:</td>
                        <td>{{ $history->note }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>:</td>
                        <td>{{ $history->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>:</td>
                        <td>{{ $history->updated_at }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-4 action-container">
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
    </div>
@endsection
