<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-80 object-cover rounded-lg shadow-md">
                            @else
                                <div class="w-full h-80 bg-gray-200 flex items-center justify-center rounded-lg shadow-md text-gray-500">
                                    Sin imagen disponible
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                            <p class="text-lg text-gray-700 mb-4">${{ number_format($product->price, 2) }}</p>

                            <p class="text-gray-600 mb-2"><strong>Descripción:</strong> {{ $product->description ?? 'N/A' }}</p>
                            <p class="text-gray-600 mb-2"><strong>Categoría:</strong> {{ $product->category ?? 'N/A' }}</p>
                            <p class="text-gray-600 mb-2"><strong>Talla:</strong> {{ $product->size ?? 'N/A' }}</p>
                            <p class="text-gray-600 mb-2"><strong>Color:</strong> {{ $product->color ?? 'N/A' }}</p>
                            <p class="text-gray-600 mb-2"><strong>Stock:</strong> {{ $product->stock }} unidades</p>
                            <p class="text-gray-600 mb-2"><strong>Creado el:</strong> {{ $product->created_at->format('d/m/Y H:i') }}</p>
                            <p class="text-gray-600 mb-4"><strong>Última actualización:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}</p>

                            <div class="mt-6 flex space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Editar Producto
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                                        Eliminar Producto
                                    </button>
                                </form>
                                <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Volver a la Lista
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>