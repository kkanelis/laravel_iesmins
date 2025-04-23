<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request){
        $user = auth()->user();

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old image if it exists
            if ($user->file_path && file_exists(public_path($user->file_path))) {
                unlink(public_path($user->file_path));
            }

            // Store new photo
            $file = $request->file('photo');
            $filename = 'uploads/profile_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            // Save to file_path column
            $user->file_path = 'uploads/' . $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profils atjaunināts!');
    }

}
