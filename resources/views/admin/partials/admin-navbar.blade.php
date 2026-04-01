<nav class="bg-white shadow-md px-4 py-3 flex justify-between items-center">
    <!-- Toggle button para sidebar en móviles -->
    <button id="sidebarToggle" class="lg:hidden text-gray-600 hover:text-gray-900">
        <i class="fas fa-bars text-xl"></i>
    </button>
    
    <div class="flex-1"></div>
    
    <!-- User Dropdown -->
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-gray-600"></i>
            </div>
            <span class="text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
            <i class="fas fa-chevron-down text-xs text-gray-500"></i>
        </button>
        
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" x-cloak>
            <form method="POST" action="{{ route('auth.logout') }}" id="logout-form">
                @csrf
                <button type="submit" class="w-full text-left block px-4 py-2 text-red-600 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    [x-cloak] { display: none !important; }
</style>

<script>
    // Sidebar toggle para móviles
    document.getElementById('sidebarToggle')?.addEventListener('click', function() {
        const sidebar = document.querySelector('aside');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>