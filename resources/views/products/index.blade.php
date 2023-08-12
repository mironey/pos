<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex -1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Products') }}
                </h2>
            </div>
            <div class="flex -1">
                <a href="{{route('product.create')}}" class="pos-btn">Add Product</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-md">
                <livewire:product-index />
            </div> 
        </div>
    </div>
</x-app-layout>
