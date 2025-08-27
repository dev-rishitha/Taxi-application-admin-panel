<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Models\Manufacturer;

class ModelController extends Controller
{
    // List all vehicle models
    public function index()
    {
        $models = VehicleModel::with('manufacturer')->orderBy('created_at', 'desc')->paginate(10); // eager load manufacturer relationship
        return view('models.index', compact('models'));  // or Inertia::render('Models') if you're using Inertia
    }

    public function show($id)
    {
        $model = VehicleModel::with('manufacturer')->findOrFail($id);
        return view('models.show', compact('model'));
    }

    // Show create form
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('models.create', compact('manufacturers'));
    }

    // Store new model
    public function store(Request $request)
    {
            $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        VehicleModel::create($validated);

        return redirect()->route('models.index')->with('success', 'Model added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $model = VehicleModel::findOrFail($id);
        $manufacturers = \App\Models\Manufacturer::all();

        return view('models.edit', compact('model', 'manufacturers'));
    }

    // Update existing model
    public function update(Request $request, $id)
    {
        $model = VehicleModel::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'manufacturer_id' => 'required|exists:manufacturers,id',
            ]);

            $model->update($request->only(['name', 'type', 'manufacturer_id']));

            return redirect()->route('models.index')->with('success', 'Vehicle model updated successfully.');
    }

    // Delete a model
    public function destroy($id)
    {
        $model = VehicleModel::findOrFail($id);
        $model->delete();

        return redirect()->route('models.index')->with('success', 'Vehicle model deleted successfully.');
    }
}

