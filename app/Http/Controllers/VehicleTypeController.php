<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $types = VehicleType::paginate(10);
        return view('vehicle_types.index', compact('types'));
    }

    public function create()
    {
        return view('vehicle_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:vehicle_types,name,' . ($type->id ?? 'NULL'),
            'max_passengers' => 'required|integer|min:1',
            'status' => 'boolean'
        ]);

        // $maxPassengers = $request->input('max_passengers');
        // if (empty($maxPassengers)) {
        //     $maxPassengers = rand(1, 10);
        // }

        VehicleType::create([
            'name' => $request->input('name'),
            'max_passengers' =>  $request->input('max_passengers'),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('vehicle-types.index')->with('success', 'Vehicle type added!');
    }

    public function edit($id)
    {
        $type = VehicleType::findOrFail($id);
        return view('vehicle_types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $type = VehicleType::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:vehicle_types,name,'. ($type->id ?? 'NULL'),
            'max_passengers' => 'required|integer|min:1',
            'status' => 'boolean'
        ]);
        
        $type->update([
        'name' => $request->input('name'),
        'max_passengers' =>  $request->input('max_passengers'),
        'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('vehicle-types.index')->with('success', 'Vehicle type updated!');
    }

    public function destroy($id)
    {
        $type = VehicleType::findOrFail($id);
        $type->delete();

        return redirect()->route('vehicle-types.index')->with('success', 'Vehicle type deleted!');
    }
}
