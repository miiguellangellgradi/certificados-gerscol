@extends('layouts.app')

@section('title', 'Lista de Cursos | ' . $courses->course_name)

@section('content')

<h1>{{$courses->course_name}} </h1>
<a href="{{route('courses.edit',$courses)}}">Editar</a>
<form method="POST" action="{{route('courses.destroy',$courses)}}">
@csrf @method('DELETE')
<button>Eliminar</button>
</form>
<p>{{$courses->course_description}}</p>
<p>{{$courses->created_at}}</p>

@endsection
