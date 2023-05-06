<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate();

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //$city->name = $request->name;
        //$city->save();
        $city->update($request->all());
        $city->delete();

        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index');

    }
}
