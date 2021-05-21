<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('admin.category.index', [
            'user' => getUser(),
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.category.create', [
            'user' => getUser()
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', [
            'user' => getUser(),
            'category' => $category
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|min:3|max:50|unique:categories,name'
        ]);

        Category::create($data);

        return redirect()->route('page.categories.index')->with(['status' => 'success', 'message' => 'Category successfully created!']);
    }

    public function update(Request $r, $id)
    {
        $data = $r->validate([
            'name' => 'required|string|min:3|max:50|unique:categories,name,' . $id
        ]);

        Category::find($id)->update($data);

        return redirect()->route('page.categories.index')->with(['status' => 'success', 'message' => 'Category successfully updated!']);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('page.categories.index')->with(['status' => 'success', 'message' => 'Category successfully deleted!']);
    }
}
