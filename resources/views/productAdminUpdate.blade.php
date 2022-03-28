<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container row">
                        <div class="col-6"><img src="{{asset('img/productImage.png')}}" alt="product picture"></div>
                        <div class="col-6 text-center">
                            <div>
                                <form method="POST" action="{{route('dashboardProductUpdate', ['product' => $product->id])}}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <input type="text" value="{{$product->name}}" class="form-control" id="productName"
                                           name="name">
                                    <input type="text" value="{{$product->description}}" class="form-control"
                                           id="productDescription" name="description">
                                    <input type="text" value="{{$product->net_price}}" class="form-control"
                                           id="productNet_price" name="net_price">
                                    <input type="text" value="{{$product->stock}}" class="form-control"
                                           id="productStock" name="stock">
                                    <div>
                                        <input type="hidden" value="{{$product->id}}" name="id">
                                        <input type="submit" value="modifier le produit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
