<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{

    public function stepOne()
    {
        return view('onboarding.step1');
    }

    public function storeStepOne(Request $request)
    {
        // save org details

        return redirect()->route('onboarding.step2');
    }


    public function stepTwo()
    {
        return view('onboarding.step2');
    }

    public function storeStepTwo(Request $request)
    {
        // save address

        return redirect()->route('onboarding.step3');
    }


    public function stepThree()
    {
        return view('onboarding.step3');
    }

    public function storeStepThree(Request $request)
    {
        // save organization type

        return redirect()->route('dashboard');
    }

}