<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer > </script>
    <title>Blog Post</title>
</head>
<body>

    
    <main>
        <x-app-layout>
        <section class="dashboard">
            <div class="dashboard_stats">
                <div class="dash-grid">
                    <div> <span class="material-symbols-outlined"> dashboard </span> <a href="{{ route('student.index') }}"> Dashboard </a>   </div>
                    <div> <span class="material-symbols-outlined"> person_add </span> <a href="{{ route('student.create') }}"> Add Student </a></div>
                    <div> <span class="material-symbols-outlined"> group </span> <a href="{{ route('course.create') }}"> Add Courses </a>  </div>
                    <div> <span class="material-symbols-outlined"> subject </span> <a href="{{ route('subject.index') }}"> View Subjects </a> </div>
                    <div> <span class="material-symbols-outlined"> groups_2 </span> <a href="{{ route('enrollment.create') }}">  Enroll A Student </a> </div>
                </div>
                
                <div class="display-enrolled-student">       
                    <section class="section_title">
                        <h1> Student's Profile </h1>
                    </section>

                    <section class="details_section">
                        <div class="name_title">
                            <h1> Students Details  </h1>
                            <span class="show stud material-symbols-outlined">
                                visibility
                                </span>
                        </div>
                        <div class="more-details stud_show">
                            <li> Name: {{ $student->student_name }} </li>
                            <li> Student No.: {{ $student->student_no }} </li>
                            <li> Gender: {{ $student->gender }} </li>
                            <li> Address: {{  $student->address  }} </li>
                        </div>
                    </section>

                    <section class="details_section">
                        <div class="name_title">
                            <h1> Course </h1>
                            <span class="show cour material-symbols-outlined">
                                visibility
                                </span>
                        </div>
                        <div class="more-details course_show">
                            <li> Department: {{ $student->course->department }} </li>
                            <li> Course: {{ $student->course->course_name }} </li>
                            <li> Course Code: {{ $student->course->course_code }} </li>
                        </div>
                    </section>

                    <section class="details_section">
                        <div class="name_title">
                            <h1> Subjects Enrolled </h1>
                            <span class="show subj material-symbols-outlined">
                                visibility
                                </span>
                        </div>
                        <div class="more-details subj_show">
                            @foreach ($student->course->subjects as $subject)
                                <li class="subjects"> 
                                        <p> Subject: {{ $subject->subject_name }} </p>
                                        <p> Code: {{ $subject->subject_code }} </p>
                                </li>
                            @endforeach       
                        </div>
                    </section>

                </div>
            </div>


        </section>

        </x-app-layout>
    </main>
    
</body>
</html>