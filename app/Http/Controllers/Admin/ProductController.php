<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(4);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $image = $request->file('image')->store('public/images/products');

        Product::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'description' => $request->description,
            'amount' => $request->amount,
            'category_id' => $request->categories[0]
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $destination_path = 'public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $input['image'] = $image_name;
        }


        return to_route('admin.product.index')->with('alert', 'Udało się dodać produkt!');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);
        $image = $product->image;
        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $image = $request->file('image')->store('public/images/products');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'amount' => $request->amount,
            'category_id' => $request->category_id
        ]);


        return to_route('admin.product.index')->with('alert', 'Udało się zaktualizować produkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return to_route('admin.product.index');
    }

    public function guestproductsearch(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request['search'] . '%')->paginate(10);

        return view('guest.product', compact('products'));
    }

    public function adminproductsearch(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request['search'] . '%')->paginate(10);

        return view('admin.product.index', compact('products'));
    }


    public function guestproduct()
    {
        $products = Product::paginate(5);

        return view('guest.product', compact('products'));
    }
}
