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

                <div class="add_student_form">
                    <form action="{{ route('enrollment.store') }}" method="POST">
                        @csrf
                        
                        <div>
                            <label for=""> Student </label>
                            <select name="student">
                                <option value=""> Select Student To Enroll </option>
                                @foreach ($students as $student)
                                    <option value="{{ $student }}">{{ $student }}</option>
                                @endforeach    
                            </select>
                        </div>

                        <div>
                            <label for=""> Course </label>
                            <select name="course">
                                <option value=""> Select Course To Enroll </option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course }}">{{ $course }}</option>
                                @endforeach    
                            </select>
                        </div>


                        <div class="subjects">
                            <div>
                                <label for="subject-dropdown">Select Subjects:</label>
                                <select id="subject-dropdown" name="subjects[]">
                                    <option value=""> Select Subjects To Enroll </option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject }}">{{ $subject }}</option>
                                    @endforeach    
                                </select>
                            </div>
                            
                            <div id="selected-subjects"> </div>
                            <input type="hidden" id="selected-subjects-input" name="subjects" value="">
                            <button type="button" id="add-subject" class="add-btn">Add</button>
                        
                            <button type="submit"> Enroll </button>
                        </div>
                        
                      </form>
                      
                </div>
            </div>

            
            
            @if ($errors->any())
                <div class="errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li> 
                        @endforeach
                    </ul>    
                </div>
            @endif
            
        </section>
    </main>
</x-app-layout>

</body>
</html>