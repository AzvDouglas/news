<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
    <!-- Navbar -->
	@include('components.navbar')

    <!-- Conteúdo da Página -->
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Últimas Notícias</h1>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Notícias -->
            @foreach($noticias as $noticia)
                @livewire('noticia', ['titulo' => $noticia['titulo'], 'descricao' => $noticia['descricao'], 'imagem' => $noticia['imagem']])
            @endforeach
            <div class="p-4 bg-white rounded shadow-md">
                <img src="https://via.placeholder.com/400x250" alt="Notícia 2" class="object-cover w-full h-48 mb-4">
                <h2 class="mb-2 text-lg font-semibold">Título da Notícia 2</h2>
                <p class="text-gray-600">Descrição da Notícia 2</p>
            </div>
            <div class="p-4 bg-white rounded shadow-md">
                <img src="https://via.placeholder.com/400x250" alt="Notícia 3" class="object-cover w-full h-48 mb-4">
                <h2 class="mb-2 text-lg font-semibold">Título da Notícia 3</h2>
                <p class="text-gray-600">Descrição da Notícia 3</p>
            </div>
            <div class="p-4 bg-white rounded shadow-md">
                <img src="https://via.placeholder.com/400x250" alt="Notícia 4" class="object-cover w-full h-48 mb-4">
                <h2 class="mb-2 text-lg font-semibold">Título da Notícia 4</h2>
                <p class="text-gray-600">Descrição da Notícia 4</p>
            </div>
            <div class="p-4 bg-white rounded shadow-md">
                <img src="https://via.placeholder.com/400x250" alt="Notícia 5" class="object-cover w-full h-48 mb-4">
                <h2 class="mb-2 text-lg font-semibold">Título da Notícia 5</h2>
                <p class="text-gray-600">Descrição da Notícia 5</p>
            </div>
            <div class="p-4 bg-white rounded shadow-md">
                <img src="https://via.placeholder.com/400x250" alt="Notícia 6" class="object-cover w-full h-48 mb-4">
                <h2 class="mb-2 text-lg font-semibold">Título da Notícia 6</h2>
                <p class="text-gray-600">Descrição da Notícia 6</p>
            </div>
            
            <!-- Adicione mais notícias aqui -->
        </div>
        {{ $noticias->links() }}

    </div>

    <!-- Footer -->
	@include('components.footer')
    @livewireScripts
</body>
</html>
