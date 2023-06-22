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
        {{-- <header>
            <div class="logo">
                <span class="material-symbols-outlined"> school </span>
            </div>

            <div class="user_name">
                <p> Will Smith </p>
            </div>

            <div class="logout">
                <span class="material-symbols-outlined"> logout </span>
            </div>
        </header>
 --}}

        <section class="dashboard">
            <div class="dashboard_stats">
                <div class="dash-grid">
                    <div> <span class="material-symbols-outlined"> dashboard </span> Dashboard </div>
                    <div> <span class="material-symbols-outlined"> person_add </span> Add Student </div>
                    <div> <span class="material-symbols-outlined"> group </span> View Courses </div>
                    <div> <span class="material-symbols-outlined"> subject </span> <a href="{{ route('subject.index') }}"> View Subjects </a> </div>
                    <div> <span class="material-symbols-outlined"> groups_2 </span>  Enroll A Student </div>
                </div>

                <div class="add_student_form">
                    <form action="{{ route('student.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for=""> Name: </label>
                            <input type="text" name="student_name" value="{{ $student->student_name }}">
                        </div>

                        <div>
                            <label for=""> Student No.: </label>
                            <input type="number" name="student_no" value="{{ $student->student_no }}">
                        </div>

                        <div>
                            <label for=""> Gender: </label>
                            <select name="gender"> 
                                <option value=""> Gender </option>
                                <option value="male" {{ $student->gender === 'male' ? 'selected' : ''}} > Male </option>
                                <option value="female" {{ $student->gender === 'female' ? 'selected' : ''}} > Female </option> 
                            </select>
                        </div>
                        
                        <div>
                            <label for=""> Birthday: </label>
                            <input type="date" name="birthday" value="{{ $student->birthday }}">
                        </div>

                        <div>
                            <label for=""> Address: </label>
                            <input type="text" name="address" value="{{ $student->address }}">
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