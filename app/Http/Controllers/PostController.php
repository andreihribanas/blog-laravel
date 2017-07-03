<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post; // call post model
use App\Category; // call category model
use App\Tag; // call tag model
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller 
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all blog posts
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        // return a view and pass the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, array(
            'title' => 'required | max:255',
            'slug' => 'required | alpha_dash | min:5 | max:255',
            'category' => 'required',
            'featured_image' => 'sometimes | image',
            'body' => 'required'
        ));

        // add post to database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category;


        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            // store filename to db to be accessed later
            $post->image =$filename;
        }


        $post->save();

        // atach tags to post
        $post->tags()->sync($request->tags, false);

        // set flash message
        Session::flash('success', 'The post was created succesfully');

        // redirect to another page
       // return redirect()->route('posts.show', $post->id);
        return redirect()->route('posts.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // form with data fields
        // automatically filled from database, submit to the update

        //find the post in the database and save as a variable
        $post = Post::find($id);
        
        // retrieve all categories and place them into an associative array
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        // retrieve all tags and place them into an associative array
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }

        // return the view and pass the vars previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find the submited post by id
        $post = Post::find($id);

        // check if the slug is different and validate the input data
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required | max:255',
                'category_id' => 'required | integer',
                'body' => 'required',
                'featured_image' => 'image'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required | max:255',
                'slug' => "required | alpha_dash | min:5 | max:255 | unique:posts,slug, $id",
                'category_id' => 'required | integer',
                'body' => 'required',
                'featured_image' => 'image'
            ));
        }

        

         // save input to the database
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        // check for new image and store it to db
        if ($request->hasFile('featured_image')) {
            // add new image
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            // grab old image
            $oldFilename = $post->image;

            // update database with the new image
            $post->image = $filename;

            // delete old image
            Storage::delete($oldFilename);
        }

        // save post to the db
        $post->save();

        // sync tags to posts
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            $post->tags()->sync(array());
        }
        
        // set flash data with success message
        Session::flash('success', 'The post was succesfully updated.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the post and add to a variable
        $post = Post::find($id);
        // detach any reference to the current post
        $post->tags()->detach();
        // delete image
        Storage::delete($post->image);
        // delete post
        $post->delete();

        // set flash data with success message
        Session::flash('success', 'The post was deleted');

        // redirect with flash data to posts.show
        return redirect()->route('posts.index');
    }
}
