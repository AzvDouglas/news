<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="font-sans bg-gray-100">
    <!-- Navbar -->
	@include('components.navbar')

    <!-- Conteúdo da Página -->
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Últimas Notícias</h1>
        <button id="toggleButton" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Toggle Notícias</button>

        <div id="noticiasContainer" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Notícias -->
            @foreach($noticias as $noticia)
            <!-- Renderiza o componente Noticia com a instância do modelo Noticia -->
            <livewire:noticia :noticia="$noticia" :key="$noticia->id" />
            @endforeach
        </div>
        
        <div class="m-8">
            {{ $noticias->links() }}
        </div>
    </div>

    <!-- Footer -->
	@include('components.footer')
    
    <!-- Scripts -->
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#toggleButton').click(function(){
            $('#noticiasContainer').toggle(); // Alterna a visibilidade do contêiner de notícias
        });
    });
</script>
</body>
</html>
