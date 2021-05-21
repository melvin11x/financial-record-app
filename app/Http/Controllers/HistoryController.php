<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\History;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::where('user_id', getUser()->id)->get();

        return view('user.history.index', [
            'user' => getUser(),
            'histories' => $histories
        ]);
    }

    public function show($id)
    {
        $history = History::find($id);

        return view('user.history.show', [
            'user' => getUser(),
            'history' => $history
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        $types = Type::get();

        return view('user.history.create', [
            'user' => getUser(),
            'categories' => $categories,
            'types' => $types,
        ]);
    }

    public function edit($id)
    {
        $history = History::find($id);
        $categories = Category::get();
        $types = Type::get();

        return view('user.history.edit', [
            'user' => getUser(),
            'history' => $history,
            'categories' => $categories,
            'types' => $types
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'category_id' => 'required',
            'type_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'amount' => 'required|numeric',
            'note' => 'required'
        ]);

        $data['user_id'] = getUser()->id;

        History::create($data);

        return redirect()->route('page.histories.index')->with(['status' => 'success', 'message' => 'History successfully created!']);
    }

    public function update(Request $r, $id)
    {
        $data = $r->validate([
            'category_id' => 'required',
            'type_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'amount' => 'required|numeric',
            'note' => 'required'
        ]);

        History::find($id)->update($data);

        return redirect()->route('page.histories.index')->with(['status' => 'success', 'message' => 'History successfully updated!']);
    }

    public function destroy($id)
    {
        History::find($id)->delete();

        return redirect()->route('page.histories.index')->with(['status' => 'success', 'message' => 'History successfully deleted!']);
    }
}
