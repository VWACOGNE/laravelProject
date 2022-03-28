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
                        <form method="POST" action="{{route('dashboard.product.store')}}">

                            @csrf
                            <div>
                                <label>Titre de l'article</label>
                                <input type="text" name="name"/>
                            </div>
                            <div>
                                <label>Prix HT</label>
                                <input type="number" name="net_price"/>
                            </div>
                            <div>
                                <label>Description de l'article</label>
                                <input type="text" name="description"/>
                            </div>
                            <div>
                                <label>Nom de l'image</label>
                                <input type="text" name="main_image"/>
                            </div>
                            <div>
                                <label>Poids du produit</label>
                                <input type="number" name="weight"/>
                            </div>
                            <div>
                                <label>% de TVA a appliquer</label>
                                <input type="number" name="VAT"/>
                            </div>
                            <div>
                                <label>Stock</label>
                                <input type="text" name="stock"/>
                            </div>
                            <div>
                                <button class="bg-gray-800 text-white"  type="submit">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
