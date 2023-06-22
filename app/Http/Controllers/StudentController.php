<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function __construct() {
        return $this->middleware('auth')->only(['show', 'display', 'create', 'edit', 'update', 'destroy']);
    }

    public function data() {
        $students = Student::all();
        
        return view('student.data', [
            'students' => $students
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {

        $student_count = Student::all()->count();
        $course_count = Course::all()->count();
        $enrolled_count = Student::has('course')->count();
        $top_courses_enrolled = Course::withCount('students')->orderBy('students_count', 'desc')->take(5)->get();

    

        return view('student.dashboard', [
            'student_count' => $student_count,
            'course_count' => $course_count,
            'enrolled_count' => $enrolled_count,
            'top_courses_enrolled' => $top_courses_enrolled
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        $user = Auth::user();

        

        Student::create([
            'user_id' => $user->id,
            'student_name' => $validated['student_name'],
            'student_no' => $validated['student_no'],
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'address' => $validated['address'],
            'course_id' => 1
        ]);

        return redirect(route('student.data'));
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
        $student = Student::findOrFail($id);

        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validated();

        //dd($student);

        $student->update([
            'student_name' => $validated['student_name'],
            'student_no' => $validated['student_no'],
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'address' => $validated['address']
        ]);

        return redirect(route('student.data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect(route('student.data'));
    }
}
