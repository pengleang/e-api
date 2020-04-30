<?php

namespace App\Http\Controllers;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    //Return Product::all(); //all products
      // Return ProductResource::collection(Product::all()); //use style of ProductResource
      // return new ProductCollection(Product::all()); //only one set
      //return ProductCollection::collection(Product::all()); all of ProductCollection style
      return ProductCollection::collection(Product::paginate(20)); // add pagination for 5 shows
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
    public function store(ProductRequest $request)//store(Request $request)
    {
       $product = new Product;
       $product->name =$request->name;
       $product->detail =$request->description;
       $product->stock =$request->stock;
       $product->price =$request->price;
       $product->discount =$request->discount;
       $product->save();
       // return "Hello Store Product!!";
       return response([ //return $request->all();
           'data'=> new ProductResource($product)
       ],Response::HTTP_CREATED); //],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {    //return $product;
       return new ProductResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //return $request->all();
        //return $product;
        $request['detail'] =$request->description;
        unset($request['description']);
        $product->update($request->all());
        return response([ //return $request->all();
            'data'=> new ProductResource($product)
        ],Response::HTTP_CREATED); //],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
