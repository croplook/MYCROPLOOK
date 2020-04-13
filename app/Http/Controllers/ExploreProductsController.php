<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Charts\productsChart;
use App\Reservation;
use App\postsUP;
use App\farmProducts;
use App\CropList;
use Session;
use Carbon\Carbon;
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

        // <h4>Harvest Period: December - {{$post->startHarvestYear}}</h4>
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
            $crops = CropList::pluck('crop_name', 'crop_name');
            $days = [];
            for ($day=1; $day <= 31; $day++) $days[$day] = $day;

        return view('explore-products.create')
        ->with('crops', $crops)
        ->with('days', $days);
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
            'startHarvestMonth' => 'required',
            'startHarvestYear' => 'required',
            'endHarvestMonth' => 'required',
            'endHarvestYear' => 'required',
            'startHarvestDay' => 'required',
            'endHarvestDay' => 'required',
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
            $path = $request->file('cropImage')->storeAs('public/uploads/cropImage/', $filenameToStore);

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
        $post->startHarvestMonth = $request->input('startHarvestMonth');
        $post->startHarvestYear = $request->input('startHarvestYear');
        $post->endHarvestMonth = $request->input('endHarvestMonth');
        $post->endHarvestYear = $request->input('endHarvestYear');
        $post->startHarvestDay = $request->input('startHarvestDay');
        $post->endHarvestDay = $request->input('endHarvestDay');
        $post->user_id =auth()->user()->id;
        $post->crop_image = $filenameToStore;

        $post->save();

        return redirect('/dashboard')->with('success', 'Post Created');

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
        $farm = postsUP::find($id);
        $product_user_id = $farm->id;
        $all_crop_name = $post->crop_name;
        $farm_products = farmProducts::where('id', $product_user_id)->get()->take(3);


        $allPosts = PostsUP::where('crop_name', $all_crop_name)->get()->take(4);
        return view('explore-products.view-product')
        ->with('post', $post)
        ->with('farm', $farm)
        ->with('allPosts', $allPosts)
        ->with('farm_products', $farm_products);

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

        $crops = CropList::pluck('crop_name', 'crop_name');
        if(auth()->user()->id !==$post->user_id){
            return redirect('explore-products')->with('error', 'Unauthorized Page');

            }else
            $days = [];
            for ($day=1; $day <= 31; $day++) $days[$day] = $day;
        return view('explore-products.edit')
        ->with('crops', $crops)
        ->with('days', $days)
        ->with('post', $post);



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
            $path = $request->file('cropImage')->storeAs('public/uploads/cropImage/', $filenameToStore);

        }

        $this->validate($request, [
            'cropName' => 'required',
            'cropStatus'=> 'required',
            'cropQuantity' => 'required',
            'cropDesc'=> 'required',
            'cropPrice' => 'required',
            'startHarvestMonth' => 'required',
            'startHarvestYear' => 'required',
            'endHarvestMonth' => 'required',
            'endHarvestYear' => 'required',
            'startHarvestDay' => 'required',
            'endHarvestDay' => 'required',
            'cropImage' => 'Image|nullable'

        ]);
        $post = Post::find($id);
        $post->crop_name = $request->input('cropName');
        $post->crop_price = $request->input('cropPrice');
        $post->crop_desc = $request->input('cropDesc');
        $post->crop_quantity = $request->input('cropQuantity');
        $post->crop_status = $request->input('cropStatus');
        $post->startHarvestMonth = $request->input('startHarvestMonth');
        $post->startHarvestYear = $request->input('startHarvestYear');
        $post->endHarvestMonth = $request->input('endHarvestMonth');
        $post->endHarvestYear = $request->input('endHarvestYear');
        $post->startHarvestDay = $request->input('startHarvestDay');
        $post->endHarvestDay = $request->input('endHarvestDay');
        $post->user_id =auth()->user()->id;
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
