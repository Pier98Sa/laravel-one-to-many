<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3'
            ]
        );

        $data = $request->all();

        //creazione dello slug 
        $slug = Str::of($data['name'])->slug('-');

        $counter = 1;
        while(Category::where('slug', $slug)->first()){

            $slug = Str::of($data['name'])->slug('-') .'-'. $counter;
            $counter++;
        }

        $data['slug'] = $slug;

        $category = new Category();
        $category->fill($data);
        $category->save();
        return redirect()->route('admin.categories.show', ['category' => $category->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name' => 'required|min:3'
            ]
        );

        $data = $request->all();

        //creazione dello slug 
        $slug = Str::of($data['name'])->slug('-');

        if($category->slug != $slug){
            $counter = 1;

            while(Category::where('slug', $slug)->first()){

                $slug = Str::of($data['title'])->slug('-') .'-'. $counter;
                $counter++;
            }

            $data['slug'] = $slug;
        }

        $category->fill($data);
        $category->save();
        return redirect()->route('admin.categories.show', ['category' => $category->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
