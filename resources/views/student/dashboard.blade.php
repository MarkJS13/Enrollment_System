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
    <script src="" defer > </script>
    <title>Blog Post</title>
</head>
<body>

<x-app-layout>
    <main>
        <section class="dashboard">
            <div class="dashboard_stats">
                <div class="dash-grid">
                    <div> <span class="material-symbols-outlined"> dashboard </span> <a href="{{ route('student.index') }}"> Dashboard </a> </div>
                    <div> <span class="material-symbols-outlined"> person_add </span> <a href="{{ route('student.create') }}"> Add Student </a> </div>
                    <div> <span class="material-symbols-outlined"> group </span> <a href="{{ route('course.create') }}"> Add Courses </a>  </div>
                    <div> <span class="material-symbols-outlined"> subject </span> <a href="{{ route('subject.index') }}"> View Subjects </a> </div>
                    <div> <span class="material-symbols-outlined"> groups_2 </span> <a href="{{ route('enrollment.create') }}">  Enroll A Student </a> </div>
                </div>


                <div class="dashboard_overview">
                    <h1> <span class="material-symbols-outlined"> monitoring </span> Dashboard Statistics Overview </h1>

                    <div class="overview_tiles">
                        <div class="tile student_tile">
                            <div class="top"> 
                                <div>
                                    <span class="logo material-symbols-outlined"> groups_2 </span>
                                </div>
                                
                                <p> {{ $student_count }} <span> Total Students </span> </p>
                                
                            </div>
                            <div class="bottom">
                             <span class="material-symbols-outlined"> <a href="{{ route('student.data') }}"> arrow_forward </a> </span>
                                
                            </div>
                        </div>
                        
                        <div class="tile course_tile">
                            <div class="top"> 
                                <div>
                                    <span class="logo material-symbols-outlined">
                                        library_books
                                    </span>
                                </div>
                                
                                <p> {{ $course_count }} <span> All Courses </span> </p>
                                
                            </div>
                            <div class="bottom">
                             <span class="material-symbols-outlined"> <a href="{{ route('course.index') }}"> arrow_forward </a> </span>
                                
                            </div>
                        </div>

                        <div class="tile enrolled_tile">
                            <div class="top"> 
                                <div>
                                    <span class="logo material-symbols-outlined"> how_to_reg </span>
                                </div>
                                
                                <p> {{ $enrolled_count }} <span> Enrolled Students </span> </p>
                                
                            </div>
                            <div class="bottom">
                             <span class="material-symbols-outlined"> <a href="{{ route('enrollment.index') }}"> arrow_forward </a> </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="course_enrolled">
                <h1>Top Courses Enrolled</h1>

                <div class="top_course">
                    <table>
                        @php
                            $rank = 1 
                        @endphp

                        <tr>
                            <th> Rank </th>
                            <th> Department </th>
                            <th> Course Name </th>
                            <th> Total Enrollees  </th>
                        </tr>

                        @foreach ($top_courses_enrolled as $top_courses)
                            <tr>
                                <td> {{ $rank++ }} </td>
                                <td> {{ $top_courses->department }} </td>
                                <td> {{ $top_courses->course_name }} </td>
                                <td> {{ $top_courses->students_count }} </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </section>
    
    </main>
</x-app-layout>

</body>
</html>
