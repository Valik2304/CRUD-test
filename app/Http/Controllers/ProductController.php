<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     *
     * @return RedirectResponse|Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->only(['name', 'cost', 'price', 'group']));
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     *
     * @return Application|Factory|View|Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     *
     * @return Application|Factory|View|Response
     */
    public function edit(Product $product)
    {
        return view('products.form', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     *
     * @return RedirectResponse|Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->only(['name', 'cost', 'price', 'group']));
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     *
     * @return RedirectResponse|Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully - '. $product->name);
    }
}
