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
                    <div> <span class="material-symbols-outlined"> groups_2 </span>  Enroll A Student </div>
                </div>

                <div class="add_student_form">
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for=""> Name: </label>
                            <input type="text" name="student_name" placeholder="Enter student name">
                        </div>

                        <div>
                            <label for=""> Student No.: </label>
                            <input type="number" min="1" name="student_no" placeholder="Enter student number">
                        </div>


                        <div>
                            <label for=""> Gender: </label>
                            <select name="gender"> 
                                <option value=""> Gender </option>
                                <option value="male"> Male </option>
                                <option value="female"> Female </option> 
                            </select>
                        </div>
                        
                        <div>
                            <label for=""> Birthday: </label>
                            <input type="date" name="birthday">
                        </div>

                        <div>
                            <label for=""> Address: </label>
                            <input type="text" name="address" placeholder="Enter Address">
                        </div>
                        
                        <div>
                            <button type="submit"> Save Info </button>
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