<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::get();

        return view('admin.type.index', [
            'user' => getUser(),
            'types' => $types
        ]);
    }

    public function create()
    {
        return view('admin.type.create', [
            'user' => getUser()
        ]);
    }

    public function edit($id)
    {
        $type = Type::find($id);

        return view('admin.type.edit', [
            'user' => getUser(),
            'type' => $type
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|min:3|max:50|unique:types,name'
        ]);

        Type::create($data);

        return redirect()->route('page.types.index')->with(['status' => 'success', 'message' => 'Type successfully created!']);
    }

    public function update(Request $r, $id)
    {
        $data = $r->validate([
            'name' => 'required|string|min:3|max:50|unique:types,name,' . $id
        ]);

        Type::find($id)->update($data);

        return redirect()->route('page.types.index')->with(['status' => 'success', 'message' => 'Type successfully updated!']);
    }

    public function destroy($id)
    {
        Type::find($id)->delete();

        return redirect()->route('page.types.index')->with(['status' => 'success', 'message' => 'Type successfully deleted!']);
    }
}
