<?php


namespace App\Http\Controllers\Category;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function list()
    {
        $categories = Category::paginate(15);
        $page = 'categories';

        return view('category.table', compact('categories', 'page'));
    }

    public function create()
    {
        return view('tag.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:categories,title'],
            'slug'  => ['required', 'min:5', 'unique:categories,slug'],
        ]);

        $category = Category::create($data);

        return redirect()->route('categories')->with('success', "Category \"{$category->title}\" successfully saved");
    }

    public function edit(Category $category)
    {
        return view('category.form', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:categories,title,' . $category->id],
            'slug'  => ['required', 'min:5', 'unique:categories,slug,' . $category->id],
        ]);

        $category->update($data);

        return redirect()->route('categories')->with('success', "Category \"{$category->title}\" successfully saved");
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories')->with('success', "Category \"{$category->title}\" successfully deleted");
    }
}
