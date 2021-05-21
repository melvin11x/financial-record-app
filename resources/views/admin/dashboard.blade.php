@extends('layout')

@section('page.title')
    Dashboard
@endsection

@section('style')
    @php($user = getUser())

    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    <h3>Admin Dashboard</h3>
@endsection
