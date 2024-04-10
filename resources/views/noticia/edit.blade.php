<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Editar Notícia') }}
            </h2>
        </div>
    </x-slot>

	<x-slot name="slot">
		
		<div class="py-12">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
					<div class="p-6 text-gray-900 dark:text-gray-100">
						<h1 class="mb-4 text-lg font-bold text-center">
							{{ __('Autor') }}: <span class="font-thin text-green-500">{{ $noticia->user->name }}</span>
						</h1>
	
						<!-- Formulário de Edição de Notícia -->
						<form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
							@csrf
							@method('PUT')
	
							<!-- Título -->
							<div class="mb-4">
								<label for="titulo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Título:</label>
								<input type="text" name="titulo" id="titulo" value="{{ $noticia->titulo }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
							</div>
	
							<!-- Descrição -->
							<div class="mb-4">
								<label for="descricao" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Descrição:</label>
								<textarea name="descricao" id="descricao" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">{{ $noticia->descricao }}</textarea>
							</div>
	
							<!-- Imagem -->
							<div class="mb-4">
								<label for="imagem" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Imagem:</label>
								<input type="file" name="imagem" id="imagem" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
							</div>
	
							<!-- Botão de Envio -->
							<div class="flex justify-center">
								<button type="submit" class="px-6 py-2 text-sm font-semibold text-white bg-green-500 rounded-md hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
									Atualizar Notícia
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</x-slot>
</x-app-layout>
