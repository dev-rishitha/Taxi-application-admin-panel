<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\CabAssignment;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Start query for drivers
        $query = Driver::query();

        // If search is provided, filter drivers by name, phone or cab
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('cab', 'like', "%{$search}%");
        }

        // Get the filtered or full list of drivers
        $drivers = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('drivers', compact('drivers'));
    }
    
    public function create()
    {
        return view('CreateDriver');  
    }
    // Store new driver
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'cab' => 'required|string',
            'phone' => 'required|string',
            'status' => 'required|in:available,on_trip,off_duty',
            'image_url' => 'nullable|url'
        ]);

        Driver::create($request->all());

        return redirect()->route('drivers.index')->with('success', 'Driver added successfully.');
    }

    // Show driver details (if needed)
    public function show(Driver $driver)
    {
        return view('ShowDriver', compact('driver')); 
    }

    // Show form to edit a driver
    public function edit(Driver $driver)
    {
        return view('EditDriver', compact('driver'));
    }

    // Update driver details
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string',
            'cab' => 'required|string',
            'phone' => 'required|string',
            'status' => 'required|in:available,on_trip,off_duty',
            'image_url' => 'nullable|url'
        ]);

        $driver->update($request->all());

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully.');
    }

    // Block a driver (set status to 'Blocked')
    public function block($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->status = 'Blocked';
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver blocked successfully.');
    }

    // Unblock a driver (set status to 'Available')
    public function unblock($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->status = 'Available';
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver unblocked successfully.');
    }
    public function suspend(Driver $driver)
    {
        $driver->status = 'suspended';
        $driver->save();

        return redirect()->back()->with('success', 'Driver suspended successfully!');
    }
   public function changeStatus(Driver $driver)
    {
        switch ($driver->status) {
            case 'available':
                $driver->status = 'on_trip';
                break;
            case 'on_trip':
                $driver->status = 'available';
                break;
            case 'suspended':
                $driver->status = 'available';  // or 'on_trip' if you prefer
                break;
        }
        $driver->save();
        return redirect()->back()->with('success', 'Driver status updated!');
    }
    // Show form
    public function assignCabForm(Driver $driver)
    {
        return view('drivers.assign-cab', compact('driver'));
    }

    // Handle form submission
    public function assignCab(Request $request, Driver $driver)
    {
        $request->validate([
            'cab' => 'required|string|max:255',
        ]);

        $driver->cab = $request->cab;
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Cab assigned to driver successfully!');
    }

    public function performance(Request $request)
    {
        $drivers = Driver::paginate(10);

        // If AJAX request, return JSON with data only
        if ($request->ajax()) {
            return response()->json([
                'drivers' => $drivers->items(),
                'table'   => view('partials.drivers-table', compact('drivers'))->render(),
                'pagination' => $drivers->links()->render(),
                'links' => (string) $drivers->links(),
            ]);
        }

        // Normal page load
        return view('DriversPerformance', compact('drivers'));
    }
    public function history($id)
    {
        $driver = Driver::findOrFail($id);
        // Get ride history
        $rides = Ride::where('driver_id', $id)->orderBy('created_at', 'desc')->get();

        // Assuming you have a CabAssignment model and table with driver_id, cab, assigned_at, released_at
        $cabAssignments = CabAssignment::where('driver_id', $id)->orderBy('assigned_at', 'desc')->get();

        return view('drivers.history', compact('driver', 'rides', 'cabAssignments'));
    }
}