<!DOCTYPE html>
<html>
<head>
    <title>Mensaje recibido</title>
</head>
    <body>
        <p>recibiste un mensaje de :{{$msg['nombre']}} - {{ $msg['correo']}}</p>
        <p> Asunto:{{$msg['subject']}}</p>
        <p> Mensaje:{{$msg['content' ]}}</p>
    </body>
</html>

