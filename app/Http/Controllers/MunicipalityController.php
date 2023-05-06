<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipalities = Municipality::paginate();

        return view('municipalities.index', compact('municipalities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('municipalities.add',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Municipality::create($request->all());
        return redirect()->route('municipalities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Municipality $municipality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municipality $municipality)
    {
        return view('municipalities.edit', compact('municipality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Municipality $municipality)
    {
        //$municipality->name = $request->name;
        //$municipality->save();
        $municipality->update($request->all());
        $municipality->delete();

        return redirect()->route('municipalities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipality $municipality)
    {
        $municipality->delete();

        return redirect()->route('municipalities.index');

    }
}
