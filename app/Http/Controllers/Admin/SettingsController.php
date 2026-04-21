<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::first();
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
        try {
            $validated = $request->validate(
                [
                    'company_name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'phone' => [
                        'required',
                        'regex:/^62[0-9]{8,13}$/'
                    ],
                    'address' => 'required|string|max:1000',
                    'logo' => 'nullable|image|max:2048',
                    'linkedin' => 'nullable|url',
                    'instagram' => 'nullable|url',
                    'tiktok' => 'nullable|url',
                ],
                [
                    'phone.regex' => 'The phone number must start with "62" and be followed by 8 to 13 digits.',
                ]
            );

            // Handle logo upload if provided
            if ($request->hasFile('logo')) {
                $validated['logo'] = $request->file('logo')->store('logos', 'public');
            }

            Settings::create($validated);

            return redirect()->route('admin.settings.index')->with('success', 'Created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the settings. Please try again.')->withInput();
        }
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

        $validated = $request->validate(
            [
                'company_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => ['required', 'regex:/^62[0-9]{8,13}$/'],
                'address' => 'required|string|max:1000',
                'logo' => 'nullable|image|max:2048',
                'linkedin' => 'nullable|url',
                'instagram' => 'nullable|url',
                'tiktok' => 'nullable|url',
            ],
            [
                'phone.regex' => 'The phone number must start with "62" and be followed by 8 to 13 digits.',
            ]
        );

        try {

            if ($request->hasFile('logo')) {

                if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                    Storage::disk('public')->delete($setting->logo);
                }

                $validated['logo'] = $request->file('logo')->store('logos', 'public');
            }

            $setting->update($validated);

            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Updated successfully ✅');
        } catch (\Exception $e) {

            return back()
                ->with('error', 'An error occurred while updating the settings.')
                ->withInput();
        }
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
