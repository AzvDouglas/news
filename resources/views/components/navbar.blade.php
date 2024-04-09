    <!-- Navbar -->
    <nav class="py-4 bg-blue-600">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <a href="#" class="inline-flex text-2xl font-bold text-white">
                <img src="{{ asset('img/vennx.png') }}" alt="Logo" class="block w-auto h-9">
            </a>
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </div>
    
    </nav>
