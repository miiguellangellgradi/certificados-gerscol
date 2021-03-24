@extends('layouts.app')

@section('content')
    <div class="signup-form">
        <form action="{{ route('certificate.update', $certificate) }}" method="post">
            @csrf @method('PATCH')

            @csrf
            <h2 style="margin-top: 50px; margin-bottom: 50px">Nuevo Certificado</h2>

            <div class="form-group">
                <label >Seleccione Un Estudiante</label>
                <select class="selectpicker" data-live-search="true" name="students_id" id="">
                    <option value="">Estudiantes</option>

                    @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->student_name}}</option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Seleccione Un curso</label>
                <select class="selectpicker" data-live-search="true" name="courses_id" id="">
                    <option value="">Cursos</option>

                    @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->course_name}}</option>

                    @endforeach
                </select>
            </div>

            <div  class="form-group">
                <label >Seleccione Una fecha de Expedicion</label>
               <div class="row" >
                    <div class="col">
                        <input name="certificate_expedition" data-date-format="yyyy-m-d" id="datepicker">
                    </div>
                </div>
            </div>

            <div style="margin-top: 25px; margin-bottom: 25px" class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Crear</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker').datepicker("setDate", new Date());
    </script>

@endsection

