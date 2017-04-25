<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndexPage(){
    	$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
    	return view('pages.index')->withPosts($posts);
    }

    public function getContactPage(){
    	return view('pages.contact');
    }

    public function postContact(Request $request) {
    	// validate input
    	$this->validate($request, array(
    		'email' => 'required | email | max:255',
    		'subject' => 'min:3',
    		'message' => 'min:10'
    	));

    	// create data array
    	$data = array(
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'bodyMessage' => $request->message
    	);

    	// setup mail
    	Mail::send('emails.contact', $data, function($message) use ($data) {
    		$message->from($data['email']);
    		$message->to('andrei.hribanas@gmail.com');
    		$message->subject($data['subject']);
    	}); 

    	// set flash message
    	Session::flash('success', 'Email sent.');

    	// redirect
    	return redirect('/');
    }
}
