<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menú Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Gestión de Productos</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ route('products.index') }}" class="block p-4 bg-blue-500 hover:bg-blue-600 text-black font-bold rounded-lg shadow-md text-center">
                            Ver Todos los Productos (Leer)
                        </a>
                        <a href="{{ route('products.create') }}" class="block p-4 bg-green-500 hover:bg-green-600 text-black font-bold rounded-lg shadow-md text-center">
                            Añadir Nuevo Producto (Crear)
                        </a>
                        {{-- Puedes añadir más enlaces aquí si lo deseas, por ejemplo, para una búsqueda específica --}}
                    </div>

                    <p class="mt-6 text-gray-600">
                        Desde aquí puedes gestionar el inventario de tu e-commerce de ropa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>