<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Lista de Notícias') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-slate-600">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead class="bg-slate-50 dark:bg-emerald-700">
                            <tr>
                                <th
                                    class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                    Título</th>
                                <th
                                    class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                    Descrição</th>
                                <th
                                    class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                    Data de Criação</th>
                                <th class="px-4 py-2 text-center border-b border-gray-300 dark:text-slate-100">
                                    Ações
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200 dark:bg-slate-800 dark:divide-slate-500">
                            <!-- Loop through your noticias data and populate the rows -->
                            @foreach($noticias as $noticia)
                            <tr
                                class="{{ $loop->index % 2 == 0 ? 'bg-gray-100 dark:bg-gray-800' : 'bg-white dark:bg-slate-700' }} dark:text-slate-100">

                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">
                                    {{ $noticia->titulo }}
                                </td>

                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">
                                    {{ $noticia->descricao }}
                                </td>

                                <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">
                                    {{ $noticia->created_at->format('d/m/Y H:i:s') }}
                                </td>

                                <td class="flex items-center p-2 align-middle">
                                    <!-- Action buttons -->
                                    <button
                                        class="inline-block px-4 text-white transition duration-300 bg-blue-500 rounded-md hover:bg-blue-700"
                                        {{-- onclick="openModal('{{ route('noticia.show', [$noticia]) }}')" --}}
                                        >Detalhes
                                    </button>

                                    <a href="#"
                                        class="inline-block px-4 mx-1 text-white transition duration-300 bg-yellow-500 rounded-md hover:bg-yellow-700">
                                        Editar
                                    </a>

                                    <form method="POST"
                                        action="#"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-4 text-white transition duration-300 bg-red-500 rounded-md hover:bg-red-700">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
