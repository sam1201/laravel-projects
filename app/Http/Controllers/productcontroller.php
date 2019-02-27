<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\category;
use App\User;
use App\product;
use App\tag;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\isadmin;


class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

        $this->middleware('auth');

        // $this->middleware('isadmin');
        // $this->middleware('isadmin');
    
     }


    public function index()
    {
     $role_id = Auth::User()->role_id;
        $user_id = Auth::id();
     if($role_id==1){
        $products = product::all();

     }
     
     else{
        $products = product::where('user_id',$user_id)->get();
        
     }
     $tags = tag::all();
     $category = category::all();

     $product = product::find(2);

    //  return implode('||',array($product->tags[0]));
     return view('product.index',compact('products','category','tags'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = category::all();
        $tags = tag::all();
        return view('product.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        
        $user_id = Auth::id();

        $product = new product([
                            'name'=> $request->name,
                            'user_id'=>$user_id,
                            'category_id'=>$request->category
                                ]);
        $product->save();
        $tags = $request->tags;

        $product->tags()->attach($tags);


        
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
       $user_id = Auth::id();
        $role_id = Auth::User()->role_id;
        $tags = tag::all();
        $used_tags = $product->tags;
        
        if($user_id==$product->user_id || $role_id==1){
            $categories = category::all();
            return view('product.edit',compact('product','categories','tags','used_tags'));
        }
        else{
            return abort(403);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, product $product)
    {

        $product->name = $request->name;
        $product->category_id = $request->category;

        $product->save();
        $tags = $request->tags;

        $product->tags()->sync($tags);
        
        

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        // return $product->tags;
        $user_id = Auth::id();
        $role_id = Auth::User()->role_id;
        if($user_id==$product->user_id || $role_id==1){
            
            $product->delete(); 
           $product->tags()->detach();
            return redirect('product');
        }
        else{
            return abort(403);
        }
    }
}
