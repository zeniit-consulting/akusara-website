<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyProfiles = CompanyProfile::first();
        return view('admin.company-profile.index', compact('companyProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company-profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_profile_title' => 'required|string|max:255',
            'company_profile_description' => 'required|string',
            'company_profile_vision' => 'nullable|string',
            'company_profile_mission' => 'nullable|string',
            'company_profile_values' => 'nullable|string',
        ]);

        try {
            CompanyProfile::create($request->all());

            return redirect()->route('admin.company-profile.index')->with('success', 'Company profile created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create company profile. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // try {
        //     $companyProfile = CompanyProfile::findOrFail($id);
        //     return view('admin.company-profile.show', compact('companyProfile'));
        // } catch (\Exception $e) {
        //     return redirect()->route('admin.company-profile.index')->with('error', 'Company profile not found.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $companyProfile = CompanyProfile::findOrFail($id);
            return view('admin.company-profile.edit', compact('companyProfile'));
        } catch (\Exception $e) {
            return redirect()->route('admin.company-profile.index')->with('error', 'Company profile not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_profile_title' => 'required|string|max:255',
            'company_profile_description' => 'required|string',
            'company_profile_vision' => 'nullable|string',
            'company_profile_mission' => 'nullable|string',
            'company_profile_values' => 'nullable|string',
        ]);

        try {
            $companyProfile = CompanyProfile::findOrFail($id);
            $companyProfile->update($request->all());

            return redirect()->route('admin.company-profile.index')->with('success', 'Company profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update company profile. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $companyProfile = CompanyProfile::findOrFail($id);
            $companyProfile->delete();

            return redirect()->route('admin.company-profile.index')->with('success', 'Company profile deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete company profile. Please try again.');
        }
    }
}
