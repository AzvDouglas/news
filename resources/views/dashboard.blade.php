<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Suas Notícias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-lg font-semibold">{{ __("Your News") }}</h3>
                    @foreach(auth()->user()->noticias as $noticia)
                        <div class="mb-4">
                            <h4 class="text-xl font-semibold">{{ $noticia->titulo }}</h4>
                            <p>{{ $noticia->descricao }}</p>
                            <p class="text-sm text-gray-500">{{ $noticia->created_at->diffForHumans() }}</p>
                            <!-- Adicione botões de edição e exclusão aqui -->
                        </div>
                    @endforeach

                    <!-- Botão para criar uma nova notícia -->
                    <a href="{{ route('noticias.create') }}" class="inline-block px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        {{ __("Create New News") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
