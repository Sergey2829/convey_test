<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $currentPlan = auth()->user()->plan;
        return view('plans', compact('plans', 'currentPlan'));
    }

    public function changePlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id'
        ]);

        auth()->user()->update([
            'plan_id' => $request->plan_id
        ]);

        return back()->with('success', 'Plan updated successfully.');
    }
}
