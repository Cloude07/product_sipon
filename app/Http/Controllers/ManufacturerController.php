<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;



class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::orderBy('title', 'ASC')->get();
 
 return view('manufacturers.index')->withManufacturers($manufacturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturer = new Manufacturer();
 
        return view('manufacturers.create')->withManufacturer($manufacturer);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->only(['title']);

        $manufacturer = Manufacturer::create($attributes);

        $request->session()->flash(
        'message',
        __('Created', ['title' => $manufacturer->title])
        );

    return redirect(route('manufacturers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturer.edit')->withManufacturer($manufacturer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $attributes = $request->only(['title']);

        $manufacturer->update($attributes);

        $request->session()->flash(
        'message',
        __('Updated', ['title' => $manufacturer->title])
        );

        return redirect(route('manufacturers.index'));

    }
    public function remove(Manufacturer $manufacturer)
    {
    return view('manufacturers.remove')->withManufacturer($manufacturer);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        $request->session()->flash(
        'message',
        __('Removed', ['title' => $manufacturer->title])
        );
        return redirect(route('manufacturers.index'));
    }
}
