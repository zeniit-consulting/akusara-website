<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heros = Hero::first();
        return view('admin.copywriting.hero.index', compact('heros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.copywriting.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_image' => 'required|image|max:2048',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('hero_image')) {
                $validated['hero_image'] = $request->file('hero_image')->store('hero_images', 'public');
            }

            Hero::create($validated);

            return redirect()->route('admin.hero.index')->with('success', 'Hero section created successfully.');
        } catch (\Throwable $e) {
            Log::error('Error creating hero section: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while creating the hero section. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hero = Hero::findOrFail($id);
        return view('admin.copywriting.hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hero = Hero::findOrFail($id);
        return view('admin.copywriting.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hero = Hero::findOrFail($id);

        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        try {
            if ($request->hasFile('hero_image')) {
                $validated['hero_image'] = $request->file('hero_image')->store('hero_images', 'public');
            }

            $hero->update($validated);

            return redirect()
                ->route('admin.hero.index')
                ->with('success', 'Hero section updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Error updating hero section: ' . $e->getMessage());
            return back()
                ->with('error', 'An error occurred while updating.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
  
public function destroy(string $id)
{
    try {
        $hero = Hero::findOrFail($id);

        
        if ($hero->hero_image) {
            Storage::disk('public')->delete($hero->hero_image);
        }
        $hero->delete();

        return redirect()
            ->route('admin.hero.index')
            ->with('success', 'Hero section deleted successfully.');

    } catch (\Throwable $e) {

        Log::error('Error deleting hero section', [
            'message' => $e->getMessage(),
        ]);

        return back()->withErrors([
            'error' => 'An error occurred while deleting the hero section.'
        ]);
    }
}
}
