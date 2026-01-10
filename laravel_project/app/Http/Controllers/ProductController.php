<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('backend.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('backend.product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   Validation

        $request->validate(
            [
                'product_name' => 'required|max:100|min:3',  //validation condition
                'price' => 'required',
                'product_stock' => 'required',
                'category' => 'required',
                'product_sku' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]

        );

        //dd(request()->photo);

        $product_img = "";
        if ($request->photo == null) {
            $product_img = 'product_photo/nophoto.jpg';
        } else {
            $product_img = request()->photo->move('product_photo', $request->photo->getClientOriginalName());
        }

        // use Eloqute
        $data = [
            'name' => $request->product_name,
            'details' => $request->details,
            'sku' => $request->product_sku,
            'stock' => $request->product_stock,
            'price' => $request->price,
            'image' => $product_img,
            'category_id' => $request->category
        ];

        // route er modde taka page a hit korbe // then success massege show index page
        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $imagePaht = public_path($product->image); // data delete from database table
        
        

        if (File::exists($imagePaht) && $product->image != 'product_photo/nophoto.jpg') {
            unlink($imagePaht);
        }


        $product->delete();  // delete from table

        return redirect()->route('product.index')->with('success', 'Successfully Delete');
    }
}
