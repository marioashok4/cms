<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

use App\Http\Requests\tags\CreateTagRequest;

use App\Http\Requests\tags\UpdateTagRequest;

 

class tagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatetagRequest $request)
    {
        Tag::create([

            'name'=>$request->name,
        ]);

        session()->flash('success','Tag Created Successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {

        return view('tags.create',compact('tag'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetagRequest $request, $id)
    {
       $tag = Tag::findOrFail($id);

       $tag->update(

        [
            'name'=>$request->name,
        ]
       );

          session()->flash('success','Tag Updated Successfully');

        return redirect(route('tags.index'));
    




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = tag::findOrFail($id);

        $tag->delete();

        session()->flash('success','Tag Deleted Successfully');

        return redirect(route('tags.index'));


    }
}
