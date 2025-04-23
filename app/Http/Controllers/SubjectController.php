<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }
    public function create()
    {
        return view('subjects.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Subject::create($request->all());

        return redirect('/subjects');
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect('/subjects');
    }
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject->update($request->all());

        return redirect('/subjects');
    }

}
