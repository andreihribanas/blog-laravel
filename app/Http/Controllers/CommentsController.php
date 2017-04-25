<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => 'store']);
    }

    public function store(Request $request, $post_id)
    {
        // validate
        $this->validate($request, array(
            'name' => 'required | max:255',
            'email' => 'required | email | max:255',
            'comment' => 'required | min: 5 | max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        // save to the db
        $comment->save();

        // set flash message
        Session::flash('success', 'Comment was added.');

        // redirect
        return redirect()->route('blog.single', [$post->slug]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find comment
        $comment = Comment::find($id);
        // return view
        return view('comments.edit')->withComment($comment);
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
        // find commnet
        $comment = Comment::find($id);

        // validate comment
        $this->validate($request, array(
            'comment' => 'required | min:5 | max:255'
        ));

        $comment->comment = $request->comment;
        $comment->save();

        // set flash message
        Session::flash('success', 'Comment updated succesfully.');

        //redirect 
        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id) {
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // grab comment
        $comment = Comment::find($id);

        // get post id
        $post_id = $comment->post->id;

        //delete comment
        $comment->delete();

        // set flash message
        Session::flash('success', 'Comment deleted');

        // redirect
        return redirect()->route('posts.show', $post_id);
    }
}
