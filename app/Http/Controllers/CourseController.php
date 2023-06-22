<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function count() {
        
    }


    public function index()
    {
        $courses = Course::all();
        return view('course.courses', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Course::pluck('department');
        
        return view('course.create', [
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        
        $validated = $request->validated();

        Course::create([
            'department' => $validated['department'],
            'course_code' => $validated['course_code'],
            'course_name' => $validated['course_name'],
            'description' => $request->description
        ]);

        return redirect(route('course.index'));
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
        $course = Course::where('id', $id)->first();
        $departments = Course::pluck('department');

     
        return view('course.edit', [
            'course' => $course,
            'departments' => $departments
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseRequest $request, string $id)
    {
        $course = Course::findOrFail($id);
        $validated = $request->validated();

        $course->update([
            'department' => $validated['department'],
            'course_name' => $validated['course_name'],
            'course_code' => $validated['course_code'],
            'description' => $request->description
        ]);


        return redirect(route('course.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        
        $course->delete();

        return redirect(route('course.index'));
    }
}
