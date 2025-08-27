<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view('Manufactures', compact('manufacturers'));
    }

    public function show($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('ManufacturerShow', compact('manufacturer'));
    }

    public function edit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('ManufacturerEdit', compact('manufacturer'));
    }

    public function update(Request $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);

        $manufacturer->name = $request->name;
        $manufacturer->country = $request->country;
        $manufacturer->status = $request->status;
        $manufacturer->save();

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer updated successfully.');
    }

    public function disable(Request $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->status = 'Disabled';
        $manufacturer->save();

        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer disabled successfully.');
    }
}
