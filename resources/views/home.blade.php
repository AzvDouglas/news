<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body class="font-sans bg-gray-100">
    <!-- Navbar -->
	@include('components.navbar')

    <!-- Conteúdo da Página -->
    <div class="container px-4 py-8 mx-auto" x-data="{ showNews: true }">
        <h1 class="mb-4 text-3xl font-bold">Últimas Notícias</h1>
        <button @click="showNews = !showNews" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Toggle Notícias</button>

        <!-- Contêiner de notícias com diretiva x-show -->
        <div x-show="showNews" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
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
    <script>
        window.Alpine || console.error('Alpine.js não foi carregado.');
    </script>
</body>
</html>
