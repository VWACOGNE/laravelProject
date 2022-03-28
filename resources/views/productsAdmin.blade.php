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
                        <a class="bg-gray-800 text-white" href="{{route('dashboard.product.create')}}">Ajouter un produit</a>
                        @foreach($products as $product)
                            <div>
                                <img src="">
                                <h3>{{$product->name}}</h3>
                                <a class="bg-indigo-50 " href="{{route('dashboardProductEdit', ['product' => $product->id])}}">Modifier le produit</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
