<div class="fixed w-full max-w-xl p-6 overflow-hidden transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg top-1/2 left-1/2 dark:bg-gray-800">
    <!-- Formulário blurwire -->
    <form wire:submit.prevent="save">
        <!-- Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Título:</label>
            <input type="text" wire:model="titulo" id="titulo" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
            @error('form.titulo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Descrição -->
        <div class="mb-4">
            <label for="descricao" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Descrição:</label>
            <textarea wire:model="descricao" id="descricao" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300"></textarea>
            @error('form.descricao') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Imagem -->
        <div class="mb-4">
            <label for="imagem" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Imagem:</label>
            <input type="file" wire:model="imagem" id="imagem" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
            @error('form.imagem') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Botões -->
        <div class="flex justify-between">
            <button type="button" @click="createNews = !createNews" class="px-6 py-2 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800">
                Cancelar
            </button>
            <button type="submit" class="px-6 py-2 text-sm font-semibold text-white bg-green-500 rounded-md hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                Salvar Notícia
            </button>
        </div>
    </form>
</div>
