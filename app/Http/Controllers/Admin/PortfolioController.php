<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.copywriting.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.copywriting.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'portfolio_title' => 'required|string|max:255',
            'portfolio_description' => 'required|string',
            'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portfolio_category' => ['required', new Enum(PortfolioCategory::class)],
        ]);

        try {
            if ($request->hasFile('portfolio_image')) {
                $validated['portfolio_image'] = $request->file('portfolio_image')->store('portfolios', 'public');
            }

            Portfolio::create($validated);

            return redirect()
                ->route('admin.portfolio.index')
                ->with('success', 'Portfolio created successfully.');
        } catch (\Throwable $e) {
            Log::error('Error creating portfolio', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['error' => 'An error occurred while creating the portfolio. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $portfolio = Portfolio::findOrFail($id);
        // return view('admin.copywriting.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.copywriting.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'portfolio_title' => 'required|string|max:255',
            'portfolio_description' => 'required|string',
            'portfolio_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'portfolio_category' => ['required', new Enum(PortfolioCategory::class)],
        ]);

        try {
            if ($request->hasFile('portfolio_image')) {
                $validated['portfolio_image'] = $request->file('portfolio_image')->store('portfolios', 'public');
            }

            $portfolio->update($validated);

            return redirect()
                ->route('admin.portfolio.index')
                ->with('success', 'Portfolio updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Error updating portfolio', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['error' => 'An error occurred while updating the portfolio. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            if ($portfolio->hero_image) {
                Storage::disk('public')->delete($portfolio->hero_image);
            }
            $portfolio->delete();

            return redirect()
                ->route('admin.portfolio.index')
                ->with('success', 'Portfolio deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Error deleting portfolio', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['error' => 'An error occurred while deleting the portfolio. Please try again.']);
        }
    }
}
