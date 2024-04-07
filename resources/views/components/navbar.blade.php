    <!-- Navbar -->
    <nav class="py-4 bg-blue-600">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <a href="#" class="text-2xl font-bold text-white">Vennx News</a>
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </div>
    
    </nav>
