<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Back Office THEDUO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto text-center">
                        <a href="{{route('dashboard.products')}}">Listing produits</a>
                    </div>
                    <div class="col-lg-6 col-md-8 mx-auto text-center">
                        <a href="#">Commandes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
