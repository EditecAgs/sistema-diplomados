<aside class="w-70 bg-gray-900 text-white shrink-0">
    <div class="p-4 border-b border-gray-800 text-center">
        <img src="{{ asset('images/ita.png') }}" alt="" class="w-20 inline-block">
        <p class="text-sm text-gray-400">Panel de Administración <br>DIPLOMADOS</p>
    </div>
    
    <nav class="p-4 space-y-2">
        <!--<a href="" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
            <i class="fas fa-tachometer-alt w-5"></i>
            <span>Dashboard</span>
        </a>-->
        
         <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" 
                    class="w-full flex items-center justify-between p-2 rounded-lg hover:bg-gray-800 transition">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-graduation-cap w-5"></i>
                    <span>Diplomados</span>
                </div>
                <i class="fas fa-chevron-down text-xs transition-transform" :class="{ 'rotate-180': open }"></i>
            </button>
            
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="ml-6 mt-1 space-y-1">
                
                <a href="{{ route("admin.diplomados.asics") }}" 
                   class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.diplomados.diseno') ? 'bg-gray-800' : '' }}">
                    <i class="fas fa-paint-brush w-4"></i>
                    <span>Diseño de ASICs</span>
                </a>
                
                <!-- Aquí puedes agregar más diplomados después -->
                
            </div>
        </div>
        
        <!--<a href="" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings') ? 'bg-gray-800' : '' }}">
            <i class="fas fa-cog w-5"></i>
            <span>Configuración</span>
        </a>-->
        
        <hr class="border-gray-800 my-4">
        
        <a href="" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-red-600 transition" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt w-5"></i>
            <span>Cerrar Sesión</span>
        </a>
        
        <form id="logout-form" action="" method="POST" class="hidden">
            @csrf
        </form>
    </nav>
</aside>