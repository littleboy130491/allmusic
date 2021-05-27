<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
       
        return view('dashboard.category.display', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => [
                'required',
                'unique:categories',
                'max:255' 
            ]
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->save();

        return redirect('dashboard/category')->with('status', 'Category '.$category->name.' successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $id)
    {
        //

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $category = Category::find($category->id);
        return view('dashboard.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('categories')->ignore($request->category),
                'max:255' 
            ]
        ]);

        $category = Category::find($category->id);
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->save();

        return redirect('dashboard/category')->with('status', 'Category '.$category->name.' successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        //
        $category_name = Category::where('id', $category)->value('name');
        Category::destroy($category);
        return redirect('dashboard/category')->with('status', 'Category '.$category_name.' successfully deleted');
    }
}
