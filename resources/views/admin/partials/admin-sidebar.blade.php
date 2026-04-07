<aside :class="collapsed ? 'w-20' : 'w-72'" 
       class="bg-linear-to-b from-gray-900 to-gray-800 text-white shrink-0 shadow-xl transition-all duration-300 relative overflow-x-hidden overflow-y-auto">
    
    <!-- Header con logo y título -->
    <div class="p-4 border-b border-gray-700/50 sticky top-0 bg-gray-900 z-10">
        <div class="flex items-center justify-between" :class="collapsed ? 'flex-col' : ''">
            <div class="flex items-center" :class="collapsed ? 'flex-col justify-center w-full mb-3' : 'space-x-3'">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center shadow-lg shrink-0">
                    <img src="{{ asset('images/ita.png') }}" alt="ITA" class="w-8">
                </div>
                <div x-show="!collapsed" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="whitespace-nowrap">
                    <p class="text-sm font-semibold text-white">Panel de Administración</p>
                    <p class="text-xs text-gray-400">Sistema de Diplomados</p>
                </div>
            </div>
            <button @click="collapsed = !collapsed; if($store.sidebar) $store.sidebar.collapsed = collapsed" 
                    class="text-gray-400 hover:text-white transition-colors"
                    :class="collapsed ? 'rotate-180' : ''">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
        </div>
    </div>
    
    <!-- Menú de navegación -->
    <nav class="p-3 space-y-1 pb-20" :class="collapsed ? 'px-2' : 'px-3'">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center rounded-lg transition-all duration-200 group"
           :class="collapsed ? 'justify-center p-2 hover:bg-gray-700/50' : 'space-x-3 px-3 py-2.5 hover:bg-gray-700/50'">
            <i class="fas fa-tachometer-alt w-5 text-center"></i>
            <span x-show="!collapsed" x-transition:enter="transition-opacity duration-300" class="whitespace-nowrap">Dashboard</span>
            @if(request()->routeIs('admin.dashboard'))
                <i class="fas fa-circle text-[6px] text-blue-300" x-show="!collapsed"></i>
            @endif
        </a>
        
        <!-- Diplomados con submenú -->
        <div x-data="{ open: {{ request()->routeIs('admin.diplomados.*') ? 'true' : 'false' }} }" class="relative">
            <button @click="open = !open" 
                    class="w-full flex items-center rounded-lg transition-all duration-200"
                    :class="collapsed ? 'justify-center p-2' : 'justify-between px-3 py-2.5'"
                    :style="collapsed && open ? 'background-color: rgba(59, 130, 246, 0.2);' : ''">
                <div class="flex items-center" :class="collapsed ? 'justify-center' : 'space-x-3'">
                    <i class="fas fa-graduation-cap w-5 text-center"></i>
                    <span x-show="!collapsed" x-transition:enter="transition-opacity duration-300" class="whitespace-nowrap">Diplomados</span>
                </div>
                <i x-show="!collapsed" 
                   class="fas fa-chevron-down text-xs transition-transform duration-200" 
                   :class="{ 'rotate-180': open }"></i>
            </button>
            
            <!-- Submenú -->
            <div x-show="open && !collapsed" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="ml-6 mt-1 space-y-1">
                
                <a href="{{ route('admin.diplomados.asics') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg transition-all duration-200 group
                          {{ request()->routeIs('admin.diplomados.asics') ? 'bg-blue-500/20 text-blue-300 border-l-2 border-blue-500' : 'text-gray-400 hover:bg-gray-700/30 hover:text-gray-200' }}">
                    <i class="fas fa-microchip w-4"></i>
                    <span>Diseño de ASICs</span>
                    @if(request()->routeIs('admin.diplomados.asics'))
                        <i class="fas fa-check text-xs ml-auto text-blue-400"></i>
                    @endif
                </a>
            </div>
        </div>
        
        <!-- Separador -->
        <div x-show="!collapsed" class="relative my-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-700/50"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-gray-800 px-2 text-xs text-gray-500">OPCIONES</span>
            </div>
        </div>
        
        <!-- Configuración -->
        <a href="#" 
           class="flex items-center rounded-lg transition-all duration-200 group"
           :class="collapsed ? 'justify-center p-2 hover:bg-gray-700/50' : 'space-x-3 px-3 py-2.5 hover:bg-gray-700/50'">
            <i class="fas fa-cog w-5 text-center group-hover:rotate-90 transition-transform duration-300"></i>
            <span x-show="!collapsed" x-transition:enter="transition-opacity duration-300" class="whitespace-nowrap">Configuración</span>
            <span x-show="!collapsed" class="text-[10px] bg-gray-700 px-1.5 py-0.5 rounded-full ml-auto">Pronto</span>
        </a>
        
        <!-- Perfil -->
        <a href="#" 
           class="flex items-center rounded-lg transition-all duration-200 group"
           :class="collapsed ? 'justify-center p-2 hover:bg-gray-700/50' : 'space-x-3 px-3 py-2.5 hover:bg-gray-700/50'">
            <i class="fas fa-user-circle w-5 text-center"></i>
            <span x-show="!collapsed" x-transition:enter="transition-opacity duration-300" class="whitespace-nowrap">Mi Perfil</span>
        </a>
        
        <!-- Cerrar Sesión versión normal -->
        <div x-show="!collapsed" class="pt-4 mt-2">
            <div class="border-t border-gray-700/50 mb-2"></div>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-lg transition-all duration-200 text-red-400 hover:bg-red-600/20 hover:text-red-300 group">
                <i class="fas fa-sign-out-alt w-5 group-hover:translate-x-1 transition-transform"></i>
                <span class="flex-1 text-left">Cerrar Sesión</span>
                <i class="fas fa-arrow-right text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </button>
        </div>
        
        <!-- Cerrar Sesión versión colapsada -->
        <div x-show="collapsed" class="pt-4 mt-2">
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="w-full flex justify-center p-2 rounded-lg transition-all duration-200 text-red-400 hover:bg-red-600/20 hover:text-red-300">
                <i class="fas fa-sign-out-alt w-5"></i>
            </button>
        </div>
    </nav>
    
    <!-- Footer del sidebar versión normal -->
    <div x-show="!collapsed" 
         x-transition:enter="transition-opacity duration-300"
         class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700/50 bg-gray-900/50">
        <div class="flex items-center justify-between text-xs text-gray-500">
            <span>Versión 1.0.0</span>
            <span>© {{ date('Y') }} EAD</span>
        </div>
    </div>
    
    <!-- Footer colapsado -->
    <div x-show="collapsed" 
         x-transition:enter="transition-opacity duration-300"
         class="absolute bottom-0 left-0 right-0 p-3 border-t border-gray-700/50 bg-gray-900/50 flex justify-center">
        <div class="w-6 h-6 bg-blue-500/20 rounded-full flex items-center justify-center">
            <span class="text-[8px] text-blue-400">1.0</span>
        </div>
    </div>
</aside>

<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="hidden">
    @csrf
</form>

<style>
    /* Scrollbar personalizado para el sidebar */
    aside::-webkit-scrollbar {
        width: 4px;
    }
    
    aside::-webkit-scrollbar-track {
        background: #1f2937;
    }
    
    aside::-webkit-scrollbar-thumb {
        background: #4b5563;
        border-radius: 4px;
    }
    
    aside::-webkit-scrollbar-thumb:hover {
        background: #6b7280;
    }
</style>