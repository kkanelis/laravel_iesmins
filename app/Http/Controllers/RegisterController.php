<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(Request $request) {
        return view("auth.register");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "first_name" => ["required", "min:3", "max:255"],
            "last_name" => ["required", "min:3", "max:255"],
            "type" => ["required"],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => ["required", Password::min(6)->numbers()->letters()->symbols(), "confirmed"]
        ]);
        
        $user = User::create($validated);
    }
}
