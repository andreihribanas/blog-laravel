<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use Session;

class TagController extends Controller
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
        // get all tags
        $tags = Tag::all();

        // submit tags to the Tags index page
        return view('tags.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data from post
        $this->validate($request, array(
            'name' => 'required | max:255'
        ));

        // store new tag to the database
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        // set flash message
        Session::flash('success', 'New tag was created succesfully');

        // redirect to index page
        return redirect()->route('tags.index');
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
        $tag = Tag::find($id);

        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
        // retrieve the tag
        $tag = Tag::find($id);
        // validate new tag input
        $this->validate($request, ['name' => 'required | max:255']);
        $tag->name = $request->name;
        $tag->save();

        // set flash success message
        Session::flash('success', 'The new tag name was succesfully saved.');

        // redirect to index
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the tag and add to a variable
        $tag = Tag::find($id);
        // delete any reference
        $tag->posts()->detach();
        // delete tag
        $tag->delete();

        // set flash data with success message
        Session::flash('success', 'The tag was deleted.');

        // redirect with flash data to posts.show
        return redirect()->route('tags.index');
    }
}
