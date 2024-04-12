<!-- resources/views/livewire/noticia-edit.blade.php -->
<div>
    <h2 class="mb-4 text-lg font-semibold">Editar Notícia</h2>
    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="titulo" class="block font-medium">Título:</label>
            <input type="text" wire:model="noticia.titulo" id="titulo" class="form-input">
        </div>
        <div class="mb-4">
            <label for="descricao" class="block font-medium">Descrição:</label>
            <textarea wire:model="noticia.descricao" id="descricao" class="form-textarea"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-600">Salvar</button>
    </form>
</div>
