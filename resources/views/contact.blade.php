@extends('layouts.app')

@section('title')
    Contact

@section('content')
    <h1>Contact</h1>
    <form method="POST" action="{{ route('contact')}} ">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre ..."  value="{{old('nombre')}}"><br>

        {!!$errors->first('nombre', '<small>:message</small><br>' )!!}

        <input type="email" name="correo" placeholder="Email ..." value="{{old('correo')}}"><br>

        {!!$errors->first('correo', '<small>:message</small><br>' )!!}


        <input name="subject" placeholder="Asunto ..." value="{{old('subject')}}"><br>

        {!!$errors->first('subject', '<small>:message</small><br>' )!!}

        <textarea name="content" id="" placeholder="Mensaje ..."  cols="30" rows="10">{{old('content')}}</textarea><br>

        {!!$errors->first('content', '<small>:message</small><br>' )!!}

        <button>Enviar</button>
    </form>

@endsection
