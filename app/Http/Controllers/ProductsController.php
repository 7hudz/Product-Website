<?php

namespace App\Http\Controllers;

use App\Models\usersform;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;
use Symfony\Component\Console\Input\Input;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Usersform::latest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $input=$request->all();
        if ($image = $request->file('image')) {
            $destinationpath='images/';
            $profileimage= date('YmdHms').'.'.$image->getClientOriginalExtension();
            $image->move($destinationpath,$profileimage);
            $input['image']=$profileimage;
        }
        usersform::create($input);
        return  redirect() -> route('products.index')
        ->with ('sucess', 'product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(usersform $product)
    {
        return view('products.show', compact('product') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usersform $product)
    {
        return view('products.edit', compact('product') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usersform $product)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            
        ]);
        $input=$request->all();
        if ($image=$request->file('image')) {
            $destinationpath='images/';
            $profileimage= date('YmdHms').'.'.$image->getClientOriginalExtension();
            $image->move($destinationpath,$profileimage);
            $input['image']=$profileimage;
        }
        else{
        unset( $input['image']);
        }
        $product->update($input);
        
        return  redirect() -> route('products.index')
        ->with ('sucess', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usersform $product)
    {
        $product->delete();
        return  redirect() -> route('products.index')
        ->with ('sucess', 'product deleted successfully');

    }
}
