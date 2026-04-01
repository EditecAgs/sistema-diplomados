@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    </div> 
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Usuarios Totales</p>
                    <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
                </div>
                <i class="fas fa-users text-3xl text-blue-500"></i>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Visitas</p>
                    <p class="text-2xl font-bold">1,234</p>
                </div>
                <i class="fas fa-chart-line text-3xl text-green-500"></i>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Ventas</p>
                    <p class="text-2xl font-bold">$12,345</p>
                </div>
                <i class="fas fa-dollar-sign text-3xl text-yellow-500"></i>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Productos</p>
                    <p class="text-2xl font-bold">42</p>
                </div>
                <i class="fas fa-box text-3xl text-purple-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Tabla de ejemplo -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b">
            <h3 class="font-semibold">Últimos Usuarios Registrados</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm">ID</th>
                        <th class="px-4 py-2 text-left text-sm">Nombre</th>
                        <th class="px-4 py-2 text-left text-sm">Email</th>
                        <th class="px-4 py-2 text-left text-sm">Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                    <tr class="border-t">
                        <td class="px-4 py-2 text-sm">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-sm">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-sm">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-sm">{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection