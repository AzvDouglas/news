

<div class="p-4 bg-white rounded shadow-md">
    <img  src="{{ asset($noticia->imagem_url) }}" alt="{{ $noticia->titulo }}" class="object-cover w-full h-48 mb-4">
    <h2 class="mb-2 text-lg font-semibold">{{ $noticia->titulo }}</h2>
    <p class="text-gray-600">{{ $noticia->descricao }}</p>

    <!-- Adicionando a data de criação e o nome do autor -->
    <div class="mt-4 text-sm text-gray-500">
        <p>Autor: {{ $noticia->user->name }}</p>
        <p>{{ $noticia->created_at->locale('pt-BR')->diffForHumans() }}</p>
    </div>
</div>
