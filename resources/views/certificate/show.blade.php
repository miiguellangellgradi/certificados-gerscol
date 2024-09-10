<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style type="text/css">
        /* Eliminar márgenes al generar el PDF */
        * {
            margin: 0;
            padding: 0;
        }

        /* Declaración correcta de las fuentes */
        @font-face {
            font-family: 'PhyllisD';
            src: url('{{ public_path('fonts/PhyllisD.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: 'NewsGothicBoldBT';
            src: url('{{ public_path('fonts/News-Gothic.ttf') }}') format('truetype');
        }
                @font-face {
            font-family: 'NewsGothicBoldBT';
            src: url('{{ public_path('fonts/News-Gothic.ttf') }}') format('truetype');
        }

        body {
            font-family: 'NewsGothicBoldBT', sans-serif;
        }

        .name {
            font-family: 'PhyllisD';
            font-size: 60px;
            text-transform: capitalize;
            color: #000000;
            margin-top: 280px;
            text-align: center;
        }

        .id {
            text-align: center;
            font-family: 'NewsGothicBoldBT';
            font-size: 30px;
            text-transform: capitalize;
            color: #000000;
            margin-top: 32px;
            margin-left: -50px;
        }

        .course {
            text-align: center;
            font-family: 'NewsGothicBoldBT';
            font-size: 35px;
            text-transform: uppercase;
            color: #000000;
            margin-top: 20px;
        }
        .duration{
            text-align: center;
            font-family: 'NewsGothicBoldBT';
            font-size: 18px;
            text-transform: uppercase;
            color: #000000;
            margin-top: 10px;
            margin-left: -400px;
        }

        .expedition {
            text-align: center;
            font-family: 'NewsGothicBoldBT';
            font-size: 12px;
            color: #000000;
            margin-top: 120px;
        }

        .validation {
            text-align: center;
            font-family: 'NewsGothicBoldBT';
            font-size: 12px;
            color: #000000;
            margin-top: 0px;
        }
    </style>
</head>
<body >

    <div style="position: fixed; left: 0px; top: 0px; right: 0px; bottom: 0px; text-align: center;z-index: -1000">
    <img src="{{ public_path('images/fondo.jpg') }}" style="width: 100%;">

      </div>
      <div >
         <p  class="name">{{ $certificates->students['student_name']}}</p>
         <p class="id"> C.C: {{ number_format($certificates->students['id'], 0 , '.' , '.') }}</p>
         <p  class="course">{{ $certificates->courses['course_name']}}</p>
         <p class="duration"> {{ $certificates->courses['course_duration'] }}</p>
         @php
         $validation = $certificates->courses['course_validation'];
         @endphp
         <p  class="expedition">Expedido el dia : {{ date("d-m-Y",strtotime($certificates->certificate_expedition))}}</p>
         <p  class="validation">Vigencia hasta el dia : {{date("d-m-Y",strtotime($certificates->certificate_expedition."+ $validation year"))}}</p>
      </div>
</body>
</html>


