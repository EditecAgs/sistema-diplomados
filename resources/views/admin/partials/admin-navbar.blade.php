<nav class="bg-white shadow-md px-4 py-3 flex justify-between items-center">
    <!-- Botón para colapsar sidebar en desktop -->
    <button @click="collapsed = !collapsed; if($store.sidebar) $store.sidebar.collapsed = collapsed" 
            class="text-gray-500 hover:text-gray-700 focus:outline-none transition-colors">
        <i class="fas fa-bars text-xl"></i>
    </button>
    
    <!-- Breadcrumb navigation -->
    <div class="hidden md:flex items-center text-sm flex-1 ml-4">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-blue-600 transition-colors">
            <i class="fas fa-home"></i>
        </a>
        <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
        <span class="text-gray-700 font-medium">@yield('title', 'Dashboard')</span>
    </div>
    
    <div class="flex-1"></div>
    
    <!-- User Dropdown -->
    <div class="relative" x-data="{ openUser: false }">
        <button @click="openUser = !openUser" 
                class="flex items-center gap-3 focus:outline-none group">
            <div class="relative">
                <div class="w-9 h-9 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
            <div class="hidden md:block text-left">
                <p class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'Administrador' }}</p>
                <p class="text-xs text-gray-400">Administrador</p>
            </div>
            <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200" 
               :class="{ 'rotate-180': openUser }"></i>
        </button>
        
        <!-- User Dropdown Menu -->
        <div x-show="openUser" 
             @click.away="openUser = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg py-2 z-50 border border-gray-100"
             x-cloak>
            
            <!-- User info -->
            <div class="px-4 py-3 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'Administrador' }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'admin@ita.edu.mx' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Menu items -->
            <div class="py-1">
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-user-circle w-4 text-gray-400"></i>
                    <span class="text-sm">Mi Perfil</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-cog w-4 text-gray-400"></i>
                    <span class="text-sm">Configuración</span>
                </a>
            </div>
            
            <div class="border-t border-gray-100 my-1"></div>
            
            <!-- Logout -->
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-red-600 hover:bg-red-50 transition-colors cursor-pointer">
                    <i class="fas fa-sign-out-alt w-4"></i>
                    <span class="text-sm">Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    [x-cloak] { display: none !important; }
</style>