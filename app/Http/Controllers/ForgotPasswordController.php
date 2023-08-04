<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('teacher.auth.password_email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        $data = $request->all();

        // Check if the 'email' field is empty or not a valid email format
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            // Redirect back with an error message
            return back()->withErrors(['email' => 'Please enter a valid email address']);
        }

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', __($response))
            : back()->withErrors(
                ['email' => __($response)]
            );
    }

     

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    protected function broker()
    {
        return Password::broker();
    }

}
