<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <style type="text/css">
        /* To remove margin while generating PDF. */
        * {
            margin:0;
            padding:0
        }

        @font-face {
    font-family: PhyllisD.ttf;
    src: url('{{asset('/fonts/PhyllisD.ttf')}}');
    font-family: NewsGothicBoldBT.ttf;
    src: url('{{asset('/fonts/NewsGothicBoldBT.ttf')}}');
}

    	body {
    	}
    	.name {
            font-family: PhyllisD.ttf;
    		font-size: 60px;
    		text-transform: capitalize;
    		color: #000000;
    	    margin-top: 255px;
            text-align: center;

    	}
        .id {

            text-align: center;
            font-family: NewsGothicBoldBT.ttf;
    		font-size: 30px;
    		text-transform: capitalize;
    		color: #000000;
    		margin-top: 15px;
            margin-left: -80px;


    	}

        .course{
           text-align: center;
           font-family: NewsGothicBoldBT.ttf;
    		font-size: 35px;
    		text-transform: uppercase;
    		color: #000000;
    		margin-top: 18px;

    	}
        .expedition{
           text-align: center;
           font-family: NewsGothicBoldBT.ttf;
    		font-size: 12px;
    		color: #000000;
    		margin-top: 155px;

    	}
        .validation{
           text-align: center;
           font-family: NewsGothicBoldBT.ttf;
    		font-size: 12px;
    		color: #000000;
    		margin-top: 1px;

    	}
    </style>
</head>
<body >

    <div style="position: fixed; left: 0px; top: 0px; right: 0px; bottom: 0px; text-align: center;z-index: -1000">
        <img src="{{URL::asset('/images/FORMATO-DE-CERTIFICADOS.jpg')}}" style="width: 100%;">

      </div>


      <div >
         <p  class="name">{{ $certificates->students['student_name']}}</p>
         <p class="id"> C.C: {{ number_format($certificates->students['id'], 0 , '.' , '.') }}</p>
         <p  class="course">{{ $certificates->courses['course_name']}}</p>
         @php
         $validation = $certificates->courses['course_validation'];
         @endphp
         <p  class="expedition">Expedido el dia : {{ date("d-m-Y",strtotime($certificates->certificate_expedition))}}</p>
         <p  class="validation">Vigencia hasta el dia : {{date("d-m-Y",strtotime($certificates->certificate_expedition."+ $validation year"))}}</p>
      </div>
</body>
</html>


