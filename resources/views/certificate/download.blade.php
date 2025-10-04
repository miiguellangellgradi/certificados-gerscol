<!DOCTYPE html>
<html>
<head>

     <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Rochester" /> 
    <title> Certificado a nombre de : {{ $certificates->students['student_name']}}  </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    		margin-top: 22px;
    	}

        .course{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 35px;
    		text-transform: uppercase;
    		color: #000000;
    		margin-top: 13px;
    	}
        .expedition{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 12px;
    		color: #fff;
    		margin-top: 230px;
            margin-left:530px;
    	}
        .validation{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 12px;
    		color: #fff;
    		margin-top: 1px;
            margin-left:500px;
    	}
        .duration{
           text-align: center;
           font-family: 'NewsGothicBoldBT';
    		font-size: 18px;
    		color: #000000;
            margin-top: -3px;
            margin-right: 420px;
    	}

        .qrcode{
            text-align: right;
            position: absolute;
    		color: #000000;
            top:82%;
            left:85%;
        }
    </style>
</head>
<body>
    <div style="position: fixed; left: 0px; top: 0px; right: 0px; bottom: 0px; text-align: center; z-index: -1000">
        <img src="{{ public_path('images/' . ($certificates->background_image ?? '3100-de-2019.jpg')) }}" style="width: 100%;">
    </div>
    <div>
        <p class="name">{{ $certificates->students['student_name'] }}</p>
        <p class="id">{{ $certificates->students['typeid'] }}: {{ number_format($certificates->students['id'], 0, '.', '.') }}</p>
        <p class="course">{{ $certificates->courses['course_name'] }}</p>
        @php
            $validation = $certificates->courses['course_validation'];
        @endphp
        <div style="display: flex; align-items: flex-start;">
            <div style="flex: 0 0 70%;">
                <p class="duration">{{ $certificates->courses['course_duration'] }}</p>
                @if(isset($certificates->language) && $certificates->language === 'en')
                    <p class="expedition">Issued on: {{ date("m-d-Y", strtotime($certificates->certificate_expedition)) }}</p>
                    @if ($validation > 0)
                        <p class="validation">Valid until: {{ date("m-d-Y", strtotime($certificates->certificate_expedition . "+ $validation year")) }}</p>
                    @endif
                @else
                    <p class="expedition">Expedido el dia: {{ date("d-m-Y", strtotime($certificates->certificate_expedition)) }}</p>
                    @if ($validation > 0)
                        <p class="validation">Vigencia hasta el dia: {{ date("d-m-Y", strtotime($certificates->certificate_expedition . "+ $validation year")) }}</p>
                    @endif
                @endif
            </div>
            <div style="flex: 0 0 30%;">
                <p class="qrcode">
                    <img src="data:image/svg+xml;base64,{{ $qrCodeBase64 }}" alt="QR Code">
                </p>
            </div>
        </div>
    </div>
</body>

</html>

</html>

