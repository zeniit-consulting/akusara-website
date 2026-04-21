<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::first();
        return view('admin.copywriting.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.copywriting.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'about_title' => 'required|string|max:225',
            'about_description' => 'required|string',
            'about_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('about_image')) {
                $validated['about_image'] = $request->file('about_image')->store('about_images', 'public');
            }

            About::create($validated);
            return redirect()->route('admin.about.index')->with('success', 'About section created successfully.');
        } catch (\Throwable $e) {
            Log::error("Error creating about section: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create about section.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.copywriting.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.copywriting.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);
        $validated = $request->validate([
            'about_title' => 'required|string|max:225',
            'about_description' => 'required|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('about_image')) {
                $validated['about_image'] = $request->file('about_image')->store('about_images', 'public');
            }

            $about->update($validated);

            return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
        } catch (\Throwable $e) {
            Log::error("Error update about section: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update about section.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */


    

    public function destroy(string $id)
    {
        try {
            $about = About::findOrFail($id);

            
            if ($about->about_image) {
                Storage::disk('public')->delete($about->about_image);
            }

           
            $about->delete();

            return redirect()
                ->route('admin.about.index')
                ->with('success', 'About section deleted successfully.');
        } catch (\Throwable $e) {

            Log::error('Error deleting about section', [
                'message' => $e->getMessage(),
            ]);

            return back()->withErrors([
                'error' => 'An error occurred while deleting the about section.'
            ]);
        }
    }
}
