<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeaturedServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredServices = FeaturedServices::all();
        return view('admin.copywriting.featured-services.index', compact('featuredServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.copywriting.featured-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'featured_services_title' => 'required|string|max:255',
            'featured_services_description' => 'required|string',
        ]);

        try {
            FeaturedServices::create($validated);

            return redirect()
                ->route('admin.featured-services.index')
                ->with('success', 'Featured service created successfully.');
        } catch (\Throwable $e) {
            Log::error('Error creating featured service', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['error' => 'An error occurred while creating the featured service. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $featuredService = FeaturedServices::findOrFail($id);
        return view('admin.copywriting.featured-services.show', compact('featuredService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $featuredService = FeaturedServices::findOrFail($id);
        return view('admin.copywriting.featured-services.edit', compact('featuredService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $featuredService = FeaturedServices::findOrFail($id);

        $validated = $request->validate([
            'featured_services_title' => 'required|string|max:255',
            'featured_services_description' => 'required|string',
        ]);

        try {
            $featuredService->update($validated);

            return redirect()
                ->route('admin.featured-services.index')
                ->with('success', 'Featured service updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Error updating featured service', [
                'message' => $e->getMessage(),
                
            ]);

            return back()
                ->withErrors(['error' => 'An error occurred while updating the featured service. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $featuredService = FeaturedServices::findOrFail($id);
            $featuredService->delete();

            return redirect()
                ->route('admin.featured-services.index')
                ->with('success', 'Featured service deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Error deleting featured service', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['error' => 'An error occurred while deleting the featured service. Please try again.']);
        }
    }
}
