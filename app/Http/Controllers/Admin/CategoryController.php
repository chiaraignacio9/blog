<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }
    //

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category = Category::create($request->all());

        session()->flash('mensaje', 'La Categoría ' . $request->name . ' se creó correctamente!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('admin.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",
        ]);

        $category->update($request->all());

        session()->flash('mensaje', 'La Categoría ' . $category->name . ' se actualizó correctamente!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        session()->flash('mensaje', 'La Categoría ' . $category->name . ' se eliminó correctamente!');
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
