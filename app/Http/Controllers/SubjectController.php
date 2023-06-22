<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();

        
        return view('subject.subjects', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validated();

        Subject::create([
            'subject_name' => $validated['subject_name'],
            'subject_code' => $validated['subject_code'],
            'description' => $validated['description']
        ]);

        return redirect(route('subject.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::findOrFail($id);

        return view('subject.edit', [
            'subject' => $subject
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubjectRequest $request, string $id)
    {
        $subject = Subject::findOrFail($id);
        $validated = $request->validated();

        $subject->update([
            'subject_name' => $validated['subject_name'],
            'subject_code' => $validated['subject_code'],
            'description' => $validated['description']
        ]);

        return redirect(route('subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::first('id', $id);
        
        $subject->delete();

        return redirect(route('subject.index'));
    }
}
