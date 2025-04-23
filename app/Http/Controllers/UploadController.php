<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,jfif|max:2048', 
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        return back()->with('success', 'File uploaded successfully!')->with('file', $path);
    }
}
