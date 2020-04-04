<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Post;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $allPosts = Post::all();

        return view('admin.index')
        ->with('allPosts', $allPosts)
        ->with('posts', $user->posts);

}
}
