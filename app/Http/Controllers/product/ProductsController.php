<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Colour;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['colours'] = Colour::all();
        $data['sizes'] = Size::all();
       return view ('products.index',$data);
    }
    public function fetchProduct()
    {
      $productdata = Products::all();
      return response()->json([
        'status' => 200,
        'products' => $productdata,
      ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'size_id' => 'required|numeric',
            'color_id' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else {
            $product = new Products();
            $product->product_name = $request->input('name');
            $product->description = $request->input('description');
            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = time().'.'.$extension;
                $file->move('uploads/products/', $filename);
                $product->image = $filename;
            }else{
                return $request;
                $product->image = '';
            }
            $product->size = $request->input('size_id');
            $product->color = $request->input('color_id');
            $product->price = $request->input('price');
            $product->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product Successfully Added',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        // $data['color']= colour::all();
        // $data['size'] =size::all();
        // $data['product']=products::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $product = Products::find($id);
            $colours = Colour::all();
            $sizes = Size::all();
            if($product){
                return response()->json([
                    'status' => 200,
                    'product' => $product,
                    'colours' => $colours,
                    'sizes' => $sizes,
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Product Not Found',
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
         $request ->validate([
            'name' => 'required',
            'description' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'price' => 'required',
         ]);
            $product = Products::find($request->prodiuct_id);
            if ($product) {
                $product->product_name = $request->name;
                $product->description = $request->description;
                $product->size = $request->size_id;
                $product->color = $request->color_id;
                $product->price = $request->price;
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('uploads/products/', $filename);
                    $product->image = $filename;
                }
                $product->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Updated Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Product Not Found',
                ]);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Product Updated Successfully',
            ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
     $delete = Products::find($request->id);
        if($delete){
            $delete->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product Deleted Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ]);
        }
    }

}
