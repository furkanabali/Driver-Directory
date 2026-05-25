<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\StoreDriverRequest;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $query = Driver::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('vehicle_type')) {
            $query->where('vehicle_type', $request->vehicle_type);
        }

        $drivers = $query->latest()->get();

        $stats = [
            'total' => Driver::count(),
            'active' => Driver::where('status', 'active')->count(),
            'inactive' => Driver::where('status', 'inactive')->count(),
        ];

        return view('drivers.index', compact('drivers', 'stats'));
    }

    
    public function create()
    {
        return view('drivers.create');
    }

    
    public function store(StoreDriverRequest $request)
    {
        Driver::create($request->validated());

        return redirect()->route('drivers.index')
            ->with('success', 'Sürücü başarıyla eklendi.');
    }
}