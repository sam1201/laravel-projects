<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\isadmin;

class CategoryController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

        $this->middleware('isadmin');
        // $this->middleware('isadmin',['except'=>['index']]);
        // $this->middleware('isadmin',['only'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::User()->role_id;
        $categories = category::all();

        return view('category.index',compact('categories','user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $category = new category();

        $category->name = $request->name;

        $category->save();

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        $data = category::find($category);

        
        return view('category.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $data = category::find($category);
        

        return view('category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, category $category)
    {
        
        $category->name = $request->name;

        $category->save();
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect('category');
    }
}
