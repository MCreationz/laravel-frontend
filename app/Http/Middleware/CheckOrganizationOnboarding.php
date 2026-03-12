<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOrganizationOnboarding
{
    public function handle(Request $request, Closure $next)
    {
        $organization = Auth::guard('organization')->user();

        if (!$organization) {
            return redirect()->route('login'); 
        }

        // Skip middleware if already on onboarding routes
        $onboardingRoutes = [
            'onboarding.step1',
            'onboarding.step1.store',
            'onboarding.step2',
            'onboarding.step2.store',
            'onboarding.step3',
            'onboarding.step3.store',
        ];

        if (in_array($request->route()->getName(), $onboardingRoutes)) {
            return $next($request);
        }

        // Check if profile exists
        if (!$organization->profile) {
            return redirect()->route('onboarding.step1');
        }

        // Check if address exists
        if (!$organization->address) {
            return redirect()->route('onboarding.step2');
        }

        return $next($request);
    }
}