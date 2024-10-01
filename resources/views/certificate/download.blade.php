<!DOCTYPE html>
<html>
<head>

     <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Rochester" /> 
    <title> Certificado a nombre de : {{ $certificates->students['student_name']}}  </title>

    <meta charset="utf-8" />
    <style type="text/css">
        /* To remove margin while generating PDF. */
        * {
            margin:0;
            padding:0
        }


        @font-face {
                font-family:'PhyllisD';
                src: url('{{ public_path('fonts/PhyllisD.ttf') }}') format('truetype'); 
                
                font-weight: normal;
            }
        @font-face {
                font-family:'NewsGothicBoldBT';
                src: url('{{ public_path('fonts/NewsGothicBoldBT.ttf') }}') format('truetype');
                font-style: normal;
                font-weight: normal;
            }
        @font-face {
                font-family:'News-Gothic';
                src: url('{{ public_path('fonts/News-Gothic.ttf') }}') format('truetype');
                font-style: normal;
                font-weight: normal;
            }    

    	body {

    	}
    	.name {
            font-family: 'PhyllisD';
            
            font-variant: normal;
            font-weight: 400;
            line-height: 53.9px;
    		font-size: 68px;
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
    		margin-top: 25px;



    	}

        .course{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 35px;
    		text-transform: uppercase;
    		color: #000000;
    		margin-top: 15px;

    	}
        .expedition{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 12px;
    		color: #000000;
    		margin-top: 100px;

    	}
        .validation{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 12px;
    		color: #000000;
    		margin-top: 1px;

    	}
        .duration{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 18px;
    		color: #000000;
            margin-top: -8px;
            margin-right: 420px;

    	}

        .qrcode{
            text-align: right;
    		color: #000000;
    		margin-top: 20px;
            margin-right: 25px;
        }
    </style>
</head>
<body>
    <div style="position: fixed; left: 0px; top: 0px; right: 0px; bottom: 0px; text-align: center; z-index: -1000">
        <img src="{{ public_path('images/fondo.jpg') }}" style="width: 100%;">
    </div>
    <div>
        <p class="name">{{ $certificates->students['student_name'] }}</p>
        <p class="id">{{ $certificates->students['typeid'] }}: {{ number_format($certificates->students['id'], 0, '.', '.') }}</p>
        <p class="course">{{ $certificates->courses['course_name'] }}</p>
        @php
            $validation = $certificates->courses['course_validation'];
        @endphp
        <p class="duration">{{ $certificates->courses['course_duration'] }}</p>
        <p class="expedition">Expedido el dia: {{ date("d-m-Y", strtotime($certificates->certificate_expedition)) }}</p>

        @if ($validation > 0)
            <p class="validation">Vigencia hasta el dia: {{ date("d-m-Y", strtotime($certificates->certificate_expedition . "+ $validation year")) }}</p>
        @endif

        <p class="qrcode">
            <img src="data:image/svg+xml;base64,{{ $qrCodeBase64 }}" alt="QR Code">
        </p>
    </div>
</body>

</html>

</html>

