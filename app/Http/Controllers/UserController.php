<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard', [
            'user' => getUser()
        ]);
    }

    public function report()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $histories = History::where('user_id', getUser()->id)->whereBetween('date', [$startDate, $endDate])->orderBy('date')->get();

        $report = app()->make('stdClass');

        $report->monthlySpending = $histories->sum('amount');

        $report->weeklyHistories = $histories->groupBy(function ($history) {
            return Carbon::parse($history->date)->weekOfMonth;
        })->map(function ($weeklyHistory) {
            $newWeeklyHistory = app()->make('stdClass');
            $newWeeklyHistory->histories = $weeklyHistory;
            $newWeeklyHistory->weeklySpending = $weeklyHistory->sum('amount');
            return $newWeeklyHistory;
        });

        $report->basedOnCategory = $histories->groupBy('category.name')->map(function ($history) {
            return $history->sum('amount');
        });

        $report->basedOnType = $histories->groupBy('type.name')->map(function ($history) {
            return $history->sum('amount');
        });

        return view('user.report', [
            'user' => getUser(),
            'report' => $report
        ]);
    }

    public function updateIncome(Request $r)
    {
        $data = $r->validate([
            'income' => 'required|numeric'
        ]);

        User::find(getUser()->id)->update($data);

        return back()->with(['status' => 'success', 'message' => 'Income successfully updated!']);
    }
}
