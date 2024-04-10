<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Criar Nova Notícia') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <!-- Seu conteúdo aqui -->
                    <form action="{{ route('salvar-noticia') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" name="titulo" id="titulo" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                            <textarea name="descricao" id="descricao" class="w-full p-2 mt-1 border border-gray-300 rounded-md" rows="3"></textarea>
                        </div>
                        <button type="submit" class="inline-block px-4 py-2 text-white transition duration-300 bg-green-500 rounded-md hover:bg-green-700">Salvar Notícia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
