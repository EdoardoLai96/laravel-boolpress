<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index',compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.tags.create',compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $data = $request->all();
    
            $request->validate(
                [
                'name'=>'required',
            ]);
    
            $slug=Str::slug($data['name']);
    
            $counter = 1;
    
    
            while (Tag::where('slug', $slug)->first()) {
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;
            }
    
    
            $data['slug'] = $slug;
    
            $tag = new Tag();
    
            $tag->fill($data);
            $tag->save();
    
            return redirect()->route('admin.tags.index');
    
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = Post::all();
        return view('admin.tags.show',compact('tag','posts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();

        $request->validate(
            [
            'name'=>'required',
        ]);

        $slug=Str::slug($data['name']);



        if ($tag->slug != $slug) {
            $counter = 1;
            while (Tag::where('slug', $slug)->first()) {
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }


        $data['slug'] = $slug;


        $tag->update($data);
        $tag->save();

        return redirect()->route('admin.tags.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index');

    }
}
