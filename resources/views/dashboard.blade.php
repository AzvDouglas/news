<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vennx News') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @livewireStyles
    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ createNews: false, editNews:false }">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        <header class="bg-white shadow dark:bg-gray-800">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        {{ __('Lista de Notícias') }}
                    </h2>

                    <button @click="createNews = !createNews"
                        class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Cadastrar
                        Notícia </button>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div x-show="createNews"
                class="fixed inset-0 z-50 flex items-center justify-center transition duration-500 bg-green-100 bg-opacity-10">
                <div>
                    @livewire('forms.create-news-form')
                </div>
            </div>



            <!-------------------------------Mensagens Flash----------------------------->
            @if (session()->has('message'))
            <div
                class="fixed z-50 p-4 mx-auto font-bold text-white transform -translate-x-1/2 bg-yellow-600 rounded-lg left-1/2 bg-opacity-90 flash-message">
                {{ session('message') }}
            </div>
            @endif
            @if(session('success'))
            <div
                class="fixed z-50 p-4 mx-auto font-bold text-white transform -translate-x-1/2 bg-green-600 rounded-lg left-1/2 bg-opacity-90 flash-message">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div
                class="fixed z-50 p-4 mx-auto font-bold text-white transform -translate-x-1/2 bg-red-600 rounded-lg left-1/2 bg-opacity-90 flash-message">
                {{ session('error') }}
            </div>
            @endif




            <div class="py-10 bg-slate-600">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                            <table class="min-w-full bg-white dark:bg-gray-800">
                                <thead class="bg-slate-50 dark:bg-emerald-700">
                                    <tr>
                                        <th
                                            class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                            Título
                                        </th>
                                        <th
                                            class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                            Descrição
                                        </th>
                                        <th
                                            class="px-4 py-2 text-base font-bold text-left border-b border-gray-300 text-slate-900 dark:text-slate-100">
                                            Data de Criação
                                        </th>
                                        <th class="px-4 py-2 text-center border-b border-gray-300 dark:text-slate-100">
                                            
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
                                                class="inline-block p-2 px-4 text-green-100 transition duration-300 bg-blue-500 rounded-md hover:bg-green-100 hover:text-green-700">
                                                {{-- onclick="openModal('{{ route('noticia.show', [$noticia]) }}')">
                                                --}}
                                                <i class="text-sm fas fa-eye"></i>

                                            </button>

                                            <button @click="editNews = !editNews" wire:click="$emit('editNews', {{ $noticia->id }})"
                                                class="inline-block p-2 px-4 mx-4 text-white transition duration-300 bg-yellow-500 rounded-md hover:bg-white hover:text-yellow-500"><i class="fas fa-pencil-alt"></i>
                                            </button>

                                                <div x-show="editNews" class="fixed inset-0 z-50 flex items-center justify-center bg-transparent">
                                                    <div>
                                                        @livewire('forms.edit-news-form',  [$noticia->id])
                                                    </div>
                                                </div>

                                            <form method="POST" action="#"
                                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-block p-2 text-white transition duration-300 bg-red-500 rounded-md hover:bg-white hover:text-red-500">
                                                    <i class="fas fa-trash"></i> <!-- Ícone de cesta de lixo -->
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
        </main>
    </div>

    <!------------------------------ Scripts ------------------------------->
    @livewireScripts
    <script>
        // Função para esconder automaticamente as mensagens após alguns segundos
        function hideMessages() {
            setTimeout(function() {
                document.querySelectorAll('.flash-message').forEach(function(element) {
                    element.style.display = 'none';
                });
            }, 3000); //3 segundos
        }

        // Chame a função quando a página carregar
        document.addEventListener('DOMContentLoaded', function() {
            hideMessages();
        });
        
    </script>
</body>

</html>
