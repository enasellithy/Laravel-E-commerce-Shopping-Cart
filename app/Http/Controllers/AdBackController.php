<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adv;
use App\User;
use Auth;
use App\Category;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class AdBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Adv::all();
        $ads = Adv::orderBy('created_at','desc')->paginate(10);
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.ads.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'title'       => 'required',
            'desc'        => 'required|min:10',
            'price'       => 'required|numeric',
            'image_cover' => 'required|mimes:jpg,png,jpeg,gif',
            'image1'      => '',
            'image2'      => ''
            ]);
        $ads = new Adv();
        $ads->title = $request['title'];
        $ads->desc = $request['desc'];
        $ads->price = $request['price'];
        if($request->hasFile('image_cover'))
        {
            $image_cover = $request->file('image_cover');
            $filename = time() . '.' .$image_cover->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image_cover)->resize(400,400)->save($location);
            Image::make($image_cover)->save($location);
            $ads->image_cover = $filename;
        }
        if($request->hasFile('image1'))
        {
            $image1 = $request->file('image1');
            $filename = time() . '.' .$image1->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image1)->resize(400,400)->save($location);
            Image::make($image1)->save($location);
            $ads->image1 = $filename;
        }
        if($request->hasFile('image2'))
        {
            $image2 = $request->file('image2');
            $filename = time() . '.' .$image2->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image2)->resize(400,400)->save($location);
            Image::make($image2)->save($location);
            $ads->image2 = $filename;
        }
        $ads->user_id = Auth::id();
        $ads->cat_id = $request->cat_id;
        $ads->save();
        //dd($request->all());
        Session::flash('success','Ad Add');
        return redirect()->back();

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
        $cats = Category::all();
        $ads = Adv::find($id);
        return view('admin.ads.edit',compact('cats'))->withAds($ads);
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
        $this->Validate($request,[
            'title'       => 'required',
            'desc'        => 'required|min:10',
            'price'       => 'required|numeric'
            ]);
        $ads = Adv::find($id);
        $ads->title = $request->title;
        $ads->desc = $request->desc;
        $ads->price = $request->price;
        Session::flash('success','Ad Updated');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Adv::find($id);
        $ads->delete();
        Session::flash('success','Ad Delete');
        return redirect()->back();
    }
}
