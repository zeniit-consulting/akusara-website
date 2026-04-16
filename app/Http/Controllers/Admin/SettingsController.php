<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and save settings
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => [
                'required',
                'regex:/^62[0-9]{8,13}$/'
            ],
            [
                'phone.regex' => 'The phone number must start with "62" and be followed by 8 to 13 digits.'
            ],
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|max:2048',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:2048',
            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|max:2048',
            'services_title' => 'nullable|string|max:255',
            'services_description' => 'nullable|string',
            'company_profile_title' => 'nullable|string|max:255',
            'company_profile_description' => 'nullable|string',
            'company_profile_vision' => 'nullable|string',
            'company_profile_mission' => 'nullable|string',
            'company_profile_values' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',

        ]);

        // Handle logo and image section upload if provided
        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('hero_images', 'public');
        }

        if ($request->hasFile('about_image')) {
            $validated['about_image'] = $request->file('about_image')->store('about_images', 'public');
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }



        Settings::create($validated);

        return redirect()->route('admin.settings.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Settings::findOrFail($id);
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Settings::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Settings::findOrFail($id);

        // Validate and update settings
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => [
                'required',
                'regex:/^62[0-9]{8,13}$/'
            ],
            [
                'phone.regex' => 'The phone number must start with "62" and be followed by 8 to 13 digits.'
            ],
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|max:2048',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:2048',
            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|max:2048',
            'services_title' => 'nullable|string|max:255',
            'services_description' => 'nullable|string',
            'company_profile_title' => 'nullable|string|max:255',
            'company_profile_description' => 'nullable|string',
            'company_profile_vision' => 'nullable|string',
            'company_profile_mission' => 'nullable|string',
            'company_profile_values' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
        ]);

        // Handle logo and image section upload if provided

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('hero_images', 'public');
        }

        if ($request->hasFile('about_image')) {
            $validated['about_image'] = $request->file('about_image')->store('about_images', 'public');
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $setting->update($validated);

        return redirect()->route('admin.settings.index')->with('success', ' Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Settings::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')->with('success', ' Deleted successfully.');
    }
}
