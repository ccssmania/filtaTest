<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Rules\IsProductOfTheDay;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg|max:2048',
            'product_of_the_day' => ['nullable', new IsProductOfTheDay],
            'box_position' => 'nullable|required_if:product_of_the_day,1|in:top,top-start,top-end,center,center-start,center-end,bottom,bottom-start,bottom-end'
        ]);

        $product = new Product($request->all());

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();
        Alert::alert('Product Created', 'The product has been created', 'success');
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg|max:2048',
            'product_of_the_day' => ['nullable', new IsProductOfTheDay],
            'box_position' => 'nullable|required_if:product_of_the_day,1|in:top,top-start,top-end,center,center-start,center-end,bottom,bottom-start,bottom-end'
        ]);

        $product->update($request->all());

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();
        Alert::alert('Product Updated', 'The product has been updated', 'success');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function showPublic()
    {
        $products = Product::paginate(9);
        $productOfTheDay = Product::inRandomOrder()->where('product_of_the_day', true)->first();
        return view('products.show-public', compact('products', 'productOfTheDay'));
    }
}
