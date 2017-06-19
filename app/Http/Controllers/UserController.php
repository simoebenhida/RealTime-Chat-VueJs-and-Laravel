<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chat;
use Auth;
use App\Events\ChatMessage;
use App\User;
class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function chat($id)
	{
		$user = User::find($id);
		return view('chat')->with('user',$user);
	}
	public function getUser()
	{
		$user = User::take(5)->whereNotIn('id',[Auth::user()->id])->get();
		// dd($user);
		return view('getuser')->with('users',$user);
	}
    public function add(Request $request)
    {
    	$user = Auth::user();
    	$message = new Chat;
    	$message->message = $request->message;
    	$message->toID = $request->toID;
    	$user->message()->save($message);
    	event(new ChatMessage($message->message,$message->toID));
    	return response()->json(['message' => $request->message]);
    }
}
