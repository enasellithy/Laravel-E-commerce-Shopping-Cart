<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Session;
use Auth;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        $cats = Category::orderBy('created_at','asc')->paginate(10);
        return view('admin.cat.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->Validate($request,[
            'name' => 'required'
            ]);
        $cats = new Category();
        $cats->name = $request['name'];
        $cats->user_id = Auth::id();
        $cats->save();
        Session::flash('success','Category Add');
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
        $cats = Category::find($id);
        return view('admin.cat.edit')->withCats($cats);
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
            'name' => 'required',
            'desc' => 'required|min:5'
            ]);

        $cats = Category::find($id);
        $cats->name = $request->name;
        $cats->desc = $request->desc;
        $cats->save();
        Session::flash('success','Category Updated');
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
        $cats = Category::find($id);
        $cats->delete();
        Session::flash('success','Category Deleted');
        return redirect()->back();

    }
}
