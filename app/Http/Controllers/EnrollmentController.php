<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrolledStudents = Student::has('course.subjects')->with('course.subjects')->get();

        return view('enrollment.dashboard', compact('enrolledStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::pluck('subject_name');
        $courses = Course::pluck('course_name');
        $students = Student::pluck('student_name');

        return view('enrollment.create', [
            'subjects' => $subjects,
            'courses' => $courses,
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        $validated = $request->validated();
        $subjectNames = explode(',', $validated['subjects']);
        $subjectIds = Subject::whereIn('subject_name', $subjectNames)->pluck('id')->toArray();

        $course = Course::where('course_name', $validated['course'])->firstOrFail();
        $student = Student::where('student_name', $validated['student'])->firstOrFail();

        $student->update([
            'course_id' => $course->id
        ]);

        foreach ($subjectIds as $subject) {
            Enrollment::create([
                'course_id' => $course->id,
                'subject_id' => $subject
            ]);
        }

        return redirect(route('enrollment.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('course')->findOrFail($id);
        return view('enrollment.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $course = $student->course;

        if ($course) {
            $enrollmentIds = $course->subjects()->pluck('enrollments.id');
            Enrollment::whereIn('id', $enrollmentIds)->delete();
            $student->course_id = 0;
            $student->save();
        }

        return redirect(route('enrollment.index'));
    }
}
