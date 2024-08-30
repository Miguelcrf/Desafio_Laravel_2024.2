<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/10f37f7ffb.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1> <?php //@yield serve para dizer a sessao que estara naquele espaço ?>
        </div>
    @yield('conteudo')    
 </div>

 </body>
</html>