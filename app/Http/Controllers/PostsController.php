<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Category;

use App\Tag;

use App\Http\Requests\Posts\CreatePostRequest;

use App\Http\Requests\Posts\UpdatePostRequest;

use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts= Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags=Tag::all();
        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $image = $request->image->store('posts');


        //Create the post
        $post=Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$image,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category,
        ]);

        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }

        session()->flash('success','Post Created Successfully');

        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {       

        $categories = Category::all();
        $tags=Tag::all();
         return view('posts.create',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {   
        $data = $request->only(['title','content','description','published_at']);
        if($request->hasFile('image'))
        {   
            //Upload the image
            $image = $request->image->store('posts');

            $post->deleteImage();

            //If the image was there
            $data['image']=$image;
        }

        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }

        //Update the attributes
        $post->update($data);

        //Flash message.
         session()->flash('success','Post Updated Successfully');

        return redirect(route('posts.index'));


    }

    /**
     * Remove the specifie d resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed())
        {       
             $post->deleteImage();
             $post->forceDelete();
        }else{

            $post->delete();
        }

        session()->flash('success','Post Deleted Successfully');

        return redirect(route('posts.index'));
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->withPosts($trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        $post->restore();

        session()->flash('success','Post Restored Successfully');

        return redirect(route('posts.index'));


    }
}
