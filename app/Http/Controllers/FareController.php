<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fare;

class FareController extends Controller
{
    public function index()
    {
        $fares = Fare::all();
        return view('fares.index', compact('fares'));
    }

    public function create()
    {
        return view('fares.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_type' => 'required',
            'base_fare' => 'required|numeric',
            'per_km' => 'required|numeric',
            'per_minute' => 'required|numeric',
            'waiting_charges' => 'required|numeric',
            'status' => 'required'
        ]);

        Fare::create($validated);
        return redirect()->route('fares.index')->with('success', 'Fare Added!');
    }

    public function edit(Fare $fare)
    {
        return view('fares.edit', compact('fare'));
    }

    public function destroy($id)
    {
        $fare = Fare::findOrFail($id);
        $fare->delete();

        return redirect()->route('fares.index')->with('success', 'Fare deleted successfully.');
    }

    public function update(Request $request, Fare $fare)
    {
        $validated = $request->validate([
            'vehicle_type' => 'required',
            'base_fare' => 'required|numeric',
            'per_km' => 'required|numeric',
            'per_minute' => 'required|numeric',
            'waiting_charges' => 'required|numeric',
            'status' => 'required'
        ]);

        $fare->update($validated);

        return redirect()->route('fares.index')->with('success', 'Fare updated successfully.');
    }
}
