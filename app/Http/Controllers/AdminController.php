<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Post;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getCropLists(){
        if(!Gate::allows('isAdmin')){
        abort(404, 'Sorry, the page you are looking for could not be found');
    }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $allPosts = Post::all();

        return view('admin.crop-lists')
    ->with('allPosts', $allPosts)
    ->with('posts', $user->posts);
    }
    public function getBanners(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }

        return view('admin.banners');
    }
    public function getStatistics(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.statistics');
    }
    public function getSeasonalCrops(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.seasonal-crops');
    }
    public function getConfirmUsers(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.confirm-users');
    }
    public function getAdminUsers(){
        if(!Gate::allows('isAdmin')){
            abort(404, 'Sorry, the page you are looking for could not be found');
        }
        return view('admin.admin-users');
    }
}
