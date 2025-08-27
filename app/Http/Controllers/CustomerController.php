<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Ride;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers with optional search and status filter.
     */
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $customers = $query->orderBy('id', 'asc')->latest()->paginate(10);

        return view('customers', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing a customer.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Delete a customer.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    /**
     * Fetch name suggestions for customer autocomplete.
     */
    public function suggestions(Request $request)
    {
        $query = $request->get('query');

        $customers = Customer::where('name', 'like', "{$query}%")
            ->orderBy('name')
            ->limit(5)
            ->pluck('name');

        return response()->json($customers);
    }

    /**
     * Show ride history for a customer.
     */
    public function history($id)
    {
        $customer = Customer::findOrFail($id);
        $rides = Ride::where('customer_id', $id)
            ->orderBy('date', 'desc')
            ->get();

        return view('customer-history', compact('customer', 'rides'));
    }

    /**
     * Show notification form for a customer.
     */
    public function notify($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer-notify', compact('customer'));
    }

    /**
     * Send notification to a customer (log simulation).
     */
    public function sendNotification(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Notification::create([
            'customer_id' => $customer->id,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);
        // Simulate sending notification (can replace with actual email/notification later)
        Log::info("Notification sent to {$customer->email}: {$validated['subject']} - {$validated['message']}");

        return redirect()->route('customers.index')->with('success', 'Notification sent successfully.');
    }

    /**
     * Block a customer.
     */
    public function block($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = 'blocked';
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer blocked successfully.');
    }

    /**
     * Unblock a customer.
     */
    public function unblock($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = 'active';
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer unblocked successfully.');
    }
}