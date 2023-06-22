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
            {{-- <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
        
               {{ Auth::user() }}
            </div> --}}
        

        <section class="dashboard">
            <div class="dashboard_stats">
                <div class="dash-grid">
                    <div> <span class="material-symbols-outlined"> dashboard </span> <a href="{{ route('student.index') }}"> Dashboard </a>   </div>
                    <div> <span class="material-symbols-outlined"> person_add </span> <a href="{{ route('student.create') }}"> Add Student </a></div>
                    <div> <span class="material-symbols-outlined"> group </span> <a href="{{ route('course.create') }}"> View Courses </a>  </div>
                    <div> <span class="material-symbols-outlined"> subject </span> <a href="{{ route('subject.index') }}"> View Subjects </a> </div>
                    <div> <span class="material-symbols-outlined"> groups_2 </span> <a href="{{ route('enrollment.create') }}">  Enroll A Student </a> </div>
                </div>

                <div class="student_list">
                    <table>
                        <tr>
                            <th> Student Name </th>
                            <th> Student No. </th>
                            <th> Gender </th>
                            <th> Birthday </th>
                            <th> Address </th>
                            <th> Status </th>
                            <th> - </th>
                            <th> - </th>
                        </tr>
                        

                        @foreach ($students as $student)
                            <tr>
                                <td> {{ $student->student_name }} </td>
                                <td> {{ $student->student_no }} </td>
                                <td> {{ $student->gender }} </td>
                                <td> {{ $student->birthday }} </td>
                                <td> {{ $student->address }} </td>
                                @if ($student->course)
                                    <td> Enrolled </td>
                                @else
                                    <td> Not Enrolled </td>
                                @endif
                                <td> <span class="material-symbols-outlined"> <a href="{{ route('student.edit', $student->id) }}"> edit  </a> </span> </td>
                                <td>  
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
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


        </section>

        </x-app-layout>
    </main>
    
</body>
</html>