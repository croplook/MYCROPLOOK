<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Charts\productsChart;
use App\Reservation;
use Session;
use DB;

class ExploreProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'view-product']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts = Post::all();
        //return Post::where('crop_name','Cabbage')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('crop_name','desc')->take(1)->get();
        $posts = Post::orderBy('crop_name','desc')->paginate(6);

        //$posts = Post::orderBy('created_at','desc')->get();
        return view('explore-products.index')
        ->with('posts', $posts);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
        return view('explore-products.create');
        }else
        return redirect('/login')->with('error', 'Log in First!');
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
        $this->validate($request, [
            'cropName' => 'required',
            'cropStatus'=> 'required',
            'cropQuantity' => 'required',
            'cropDesc'=> 'required',
            'cropPrice' => 'required',
            'cropHrvstPeriod' => 'required',
            'cropImage' => 'Image|nullable'

        ]);

        //handle file upload

        if($request->hasFile('cropImage')){
            //get the filename with the extension
            $filenameWithExt = $request->file('cropImage')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension= $request->file('cropImage')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cropImage')->storeAs('/mycroplook/storage/app/public/cropImage/', $filenameToStore);

        } else{
            $filenameToStore = 'no-image.jpg';
        }

        //create post
        $post = new Post;
        $post->crop_name = $request->input('cropName');
        $post->crop_price = $request->input('cropPrice');
        $post->crop_desc = $request->input('cropDesc');
        $post->crop_quantity = $request->input('cropQuantity');
        $post->crop_status = $request->input('cropStatus');
        $post->crop_harvestPeriod = $request->input('cropHrvstPeriod');
        $post->user_id =auth()->user()->id;
        $post->crop_image = $filenameToStore;

        $post->save();

        return redirect('/explore-products')->with('success', 'Post Created');

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
        $post = Post::find($id);
        return view('explore-products.view-product')->with('post', $post);
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
        $post = Post::find($id);
        {
            if(!Auth::check()){
            return redirect('/login')->with('error', 'Login First!');
        }
            else


        if(auth()->user()->id !==$post->user_id){
            return redirect('explore-products')->with('error', 'Unauthorized Page');

            }else
        return view('explore-products.edit')->with('post', $post);



    }
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

        //handle file upload

        if($request->hasFile('cropImage')){
            //get the filename with the extension
            $filenameWithExt = $request->file('cropImage')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension= $request->file('cropImage')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cropImage')->storeAs('mycroplook/storage/app/public/cropImage/', $filenameToStore);

        }

        $this->validate($request, [
            'cropName' => 'required',
            'cropStatus'=> 'required',
            'cropQuantity' => 'required',
            'cropDesc'=> 'required',
            'cropPrice' => 'required',
            'cropHrvstPeriod' => 'required',
            'cropImage'=> 'image|nullable'
        ]);

        //create post
        $post = Post::find($id);
        $post->crop_name = $request->input('cropName');
        $post->crop_price = $request->input('cropPrice');
        $post->crop_desc = $request->input('cropDesc');
        $post->crop_quantity = $request->input('cropQuantity');
        $post->crop_status = $request->input('cropStatus');
        $post->crop_harvestPeriod = $request->input('cropHrvstPeriod');
        if($request->hasFile('cropImage')){
            $post->crop_image = $filenameToStore;
            }
        $post->save();

        return redirect('/dashboard')->with('success', 'Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);
        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Removed');
    }
}
