<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Jobs\SendProductCreated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::available()->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $product = Product::create($request->all());

        SendProductCreated::dispatch($product);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $user = config('product.role');
        $admin = $product->canEdit($user);
        
        return view('product.edit', compact('product', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $this->validateRequest($request, $product->id);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function validateRequest(Request $request, $product_id = null)
    {
        $request->validate([
            'article' => [
                'required',
                'regex:/^[A-Za-z0-9]+$/',
            ],
            'name' => 'required|min:10|max:255',
            'status' => 'required|in:available,unavailable',
            'data' => 'nullable|json',
        ]);
    }

    public function products()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
