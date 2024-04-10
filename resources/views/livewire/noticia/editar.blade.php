<div>
    <h2 class="mb-4 text-xl font-semibold">Editar Notícia</h2>

    <form wire:submit.prevent="atualizar">
        <div class="mb-4">
            <label for="titulo" class="block mb-2 font-semibold">Título:</label>
            <input type="text" wire:model.defer="noticia.titulo" id="titulo" class="w-full px-4 py-2 border rounded-md">
            @error('noticia.titulo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="descricao" class="block mb-2 font-semibold">Descrição:</label>
            <textarea wire:model.defer="noticia.descricao" id="descricao" rows="4" class="w-full px-4 py-2 border rounded-md"></textarea>
            @error('noticia.descricao') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Adicione outros campos conforme necessário -->

        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
            Atualizar Notícia
        </button>
    </form>
</div>
