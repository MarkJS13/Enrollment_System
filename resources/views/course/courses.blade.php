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
                    <div> <span class="material-symbols-outlined"> dashboard </span> <a href="{{ route('student.index') }}"> Dashboard </a>   </div>
                    <div> <span class="material-symbols-outlined"> person_add </span> <a href="{{ route('student.create') }}"> Add Student </a></div>
                    <div> <span class="material-symbols-outlined"> group </span> <a href="{{ route('course.create') }}"> Add Courses </a> </div>
                    <div> <span class="material-symbols-outlined"> subject </span> <a href="{{ route('subject.index') }}"> View Subjects </a> </div>
                    <div> <span class="material-symbols-outlined"> groups_2 </span> <a href="{{ route('enrollment.create') }}">  Enroll A Student </a> </div>
                </div>

                <div class="student_list">
                    <table>
                        <tr>
                            <th> Department </th>
                            <th> Course Code </th>
                            <th> Course Name </th>
                            <th> Description </th>
                            <th> - </th>
                            <th> - </th>
                        </tr>

                        @foreach ($courses as $course)
                            <tr>
                                <td> {{ $course->department }} </td>
                                <td> {{ $course->course_code }} </td>
                                <td> {{ $course->course_name }} </td>
                                <td> {{ $course->description }} </td>
                                <td> <span class="material-symbols-outlined"> <a href="{{ route('course.edit', $course->id) }}"> edit  </a> </span> </td>
                                <td>  
                                    <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"> <span class="material-symbols-outlined"> delete </span> </button>
                                    </form>    
                                    
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>

    </main>
</x-app-layout>

</body>
</html>