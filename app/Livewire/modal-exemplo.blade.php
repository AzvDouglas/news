<div x-data="{ modalAberto: @entangle('modalAberto') }">
    <button @click="modalAberto = true">Abrir Modal</button>

    <div x-show="modalAberto" x-cloak @click.away="modalAberto = false">
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="p-8 bg-white rounded-lg">
                <h2 class="mb-4 text-lg font-semibold">Exemplo de Modal</h2>
                <p>Este é um modal de exemplo.</p>
                <button @click="modalAberto = false" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-md">Fechar Modal</button>
            </div>
        </div>
    </div>
</div>
