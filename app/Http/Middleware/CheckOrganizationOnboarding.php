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

        if (! $organization) {
            return redirect()->route('login');
        }

        $routeName = optional($request->route())->getName();

        $onboardingRoutes = [
            'onboarding.step1',
            'onboarding.step1.store',
            'onboarding.step2',
            'onboarding.step2.store',
            'onboarding.step3',
            'onboarding.step3.store',
            'onboarding.verify-pan',
            'notifications.index',
            'notifications.unread-count',
            'notifications.read',
            'notifications.read-all',
            'notifications.delete',
            'pincode.details',
        ];
        // If onboarding is already complete, don't allow onboarding pages

        
        if ($organization->isProfileComplete() && in_array($routeName, $onboardingRoutes)) {
            return redirect()->route('dashboard');
        }

        if (in_array($routeName, $onboardingRoutes)) {
            return $next($request);
        }

        // If everything is complete, allow access
        if ($organization->isProfileComplete()) {
            return $next($request);
        }

        // Step 1: Profile
        if (! $organization->profile()->exists()) {
            return redirect()->route('onboarding.step1');
        }

        // Step 2: Address
        if (! $organization->address()->exists()) {
            return redirect()->route('onboarding.step2');
        }

        // Step 3: Operational Details
        if (! $organization->operationalDetail()->exists()) {
            return redirect()->route('onboarding.step3');
        }

        return $next($request);
    }
}
