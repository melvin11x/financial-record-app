@extends('layout')

@section('page.title')
    Report
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/report.css') }}">
@endsection

@section('title')
    Report
@endsection

@section('content')
    <div class="report">
        <div>
            <h2>Income: <span>{{ convertToCurrency($user->income) }}</span></h2>
        </div>

        <hr>

        <div>
            <h3>Monthly Report</h3>
            <p>Total spend: {{ convertToCurrency($user->income >= $report->monthlySpending ? $report->monthlySpending : $user->income - $report->monthlySpending) }}</p>
        </div>

        <div>
            <h3>Weekly Report</h3>
            <ul>
                @foreach($report->weeklyHistories as $week => $weeklyHistory)
                    <li>Week {{ $week }} Total spend: {{ convertToCurrency($weeklyHistory->weeklySpending) }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>Spending based on category</h3>
            <ul>
                @foreach($report->basedOnCategory as $category => $spending)
                    <li>{{ $category }}: {{ convertToCurrency($spending) }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>Spending based on type</h3>
            <ul>
                @foreach($report->basedOnType as $type => $spending)
                    <li>{{ $type }}: {{ convertToCurrency($spending) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
