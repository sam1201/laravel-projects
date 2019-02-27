<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;
use App\Http\Middleware\isadmin;
use App\Http\Requests\TagRequest;

class tagcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
     
        $this->middleware('auth');

        $this->middleware('isadmin');
    }  
    public function index()
    {
        $tags = tag::all();

        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        tag::create($request->all());

        return redirect('tag');
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, tag $tag)
    {
        $tag->update($request->all());
        
        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        $tag->delete();

        return redirect('tag');
    }
}
