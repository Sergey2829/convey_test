<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Http\Requests\DashboardRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $domains = auth()->user()->domains;
        return view('dashboard', compact('domains'));
    }

    public function storeDomain(DashboardRequest $request): RedirectResponse
    {
        if (!$request->isValidDomain()) {
            dd(11);
             return back()->with('error', 'Invalid domain format. Please enter a valid domain.');
        }

        auth()->user()->domains()->create([
            'domain' => $request->getFormattedDomain()
        ]);

        return back()->with('success', 'Domain added successfully.');
    }

    public function updateDomain(DashboardRequest $request, Domain $domain): RedirectResponse
    {
        if (!$request->isValidDomain()) {
            return back()->with('error', 'Invalid domain format. Please enter a valid domain.');
        }

        $domain->update([
            'domain' => $request->getFormattedDomain()
        ]);

        return back()->with('success', 'Domain updated successfully.');
    }

    public function deleteDomain(Domain $domain): RedirectResponse
    {
        $domain->delete();
        return back()->with('success', 'Domain deleted successfully.');
    }
}
