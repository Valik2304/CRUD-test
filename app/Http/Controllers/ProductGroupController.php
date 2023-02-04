<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\ProductGroup;
use Illuminate\Http\Response;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $groups = ProductGroup::orderByDesc('id')->paginate(5);
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function store(Request $request)
    {
        ProductGroup::create($request->only(['name', 'temp']));
        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param ProductGroup $group
     *
     * @return Application|Factory|View|Response
     */
    public function show(ProductGroup $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductGroup $productGroup
     *
     * @return Application|Factory|View|Response
     */
    public function edit(ProductGroup $group)
    {
        return view('groups.form', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProductGroup $productGroup
     *
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function update(Request $request, ProductGroup $group)
    {
        $group->update($request->only(['name', 'temp']));
        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function destroy(ProductGroup $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully - '. $group->name);

    }
}
