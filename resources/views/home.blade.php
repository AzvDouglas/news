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
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Notícias -->
            @foreach($noticias as $noticia)
                @livewire('noticia', ['titulo' => $noticia['titulo'], 'descricao' => $noticia['descricao'], 'imagem' => $noticia['imagem']])
            @endforeach
        </div>
        <div class="m-8">
            {{ $noticias->links() }}
        </div>
    </div>

    <!-- Footer -->
	@include('components.footer')
    @livewireScripts
</body>
</html>
