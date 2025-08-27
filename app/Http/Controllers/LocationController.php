<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function index()
    {
        $locations = Location::latest()->paginate(10);

        $activeCount = Location::where('status', 'Active')->count();
        $disabledCount = Location::where('status', 'Disabled')->count();
        $highDemandCount = Location::where('status', 'High Demand')->count();

        return view('LocationManagement', compact('locations', 'activeCount', 'disabledCount', 'highDemandCount'));
    }

    public function create()
    {
        return view('LocationCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'distance_range' => 'required|integer',
            'base_fare' => 'required|numeric',
            'active_hours' => 'required|string',
            'status' => 'required'
        ]);

        Location::create($request->all());
        return redirect()->route('locations.index')->with('success', 'Location added successfully.');
    }
    // Disable a location (e.g. set status to 'Disabled')
    public function disable(Location $location)
    {
        $location->update(['status' => 'Disabled']);
        return redirect()->route('locations.index')->with('success', 'Location disabled successfully.');
    }

    // Show a map page for a location
    public function map(Location $location)
    {
        return view('LocationMap', compact('location'));
    }

    public function show(Location $location)
    {
        //
    }

    public function edit(Location $location)
    {
        return view('LocationEdit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
         $request->validate([
        'name' => 'required|string',
        'city' => 'required|string',
        'distance_range' => 'required|integer',
        'base_fare' => 'required|numeric',
        'active_hours' => 'required|string',
        'status' => 'required'
    ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        // Soft disable by updating status
        $location->update(['status' => 'Disabled']);

        return redirect()->route('locations.index')->with('success', 'Location disabled successfully.');
    }
    public function showMap()
    {
        $locations = Location::all();
        return view('LocationMap', compact('locations'));
    }
}
