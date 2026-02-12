<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Prueba efectivale</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    
    <!-------------Header-------------->
    <header class="p-2">
        <div class="col-4">
            <a href="/">
                <img src="{{ asset('images/efectivaleLogo.png') }}" alt="Efectivale Logo">
            </a>
        </div>
    </header>

    <!------------Contenido principal-------->
    <main class="container mb-4 mt-2">
        {{$slot}}
    </main>



    <!-----------Footer-------------------->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} Efectivale - Todos los derechos reservados.</p>
            <small class="text-muted">Soluciones de gestión empresarial.</small>
        </div>
    </footer>

</body>
</html>