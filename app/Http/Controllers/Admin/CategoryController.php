<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
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
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
            'name'=>'required',
        ]);

        $slug=Str::slug($data['name']);

        $counter = 1;


        while (Category::where('slug', $slug)->first()) {
            $slug = Str::slug($data['name']) . '-' . $counter;
            $counter++;
        }


        $data['slug'] = $slug;

        $category = new Category();

        $category->fill($data);
        $category->save();

        return redirect()->route('admin.categories.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));

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
        $data = $request->all();

        $request->validate(
            [
            'name'=>'required',
        ]);

        $slug=Str::slug($data['name']);



        if ($category->slug != $slug) {
            $counter = 1;
            while (Category::where('slug', $slug)->first()) {
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }


        $data['slug'] = $slug;


        $category->udpdate($data);
        $category->save();

        return redirect()->route('admin.categories.index');


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
