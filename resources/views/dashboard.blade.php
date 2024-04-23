<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vennx News') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ createNews: false, editNews:false }">
    
	<livewire:main/>
    <!------------------------------ Scripts ------------------------------->
    @livewireScripts
    <script>
        // Função para esconder automaticamente as mensagens após alguns segundos
        function hideMessages() {
            setTimeout(function() {
                document.querySelectorAll('.flash-message').forEach(function(element) {
                    element.style.display = 'none';
                });
            }, 3000); //3 segundos
        }

        // Chame a função quando a página carregar
        document.addEventListener('DOMContentLoaded', function() {
            hideMessages();
        });
        
    </script>
</body>

</html>
