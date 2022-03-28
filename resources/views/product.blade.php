@extends('layouts.frontOffice')
@section('content')
    <div class="container content">
        <div class="container row">
            <div class="col-6"><img src="{{asset('img/productImage.png')}}" alt="product picture"></div>
            <div class="col-6 text-center">
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <div class="row">
                    <div class="col-6">{{$product->weight}}g</div>
                    <div class="col-6">{{ $product->all_taxes_included_price}}€ TTC</div>
                </div>
                <div>
                    <form method="POST" action="{{route('cart.update')}}">
                        @csrf
                        <div class="row">
                            <div class="col-6"><input type="number" name="quantity" min="1" max="{{$product->stock}}">
                            </div>
                            <div class="col-6"><p>stock restant:{{$product->stock}}</p></div>

                        </div>
                        <div>
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <input type="submit" value="ajouter au panier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container row text-center">
            <div class="col-2 border border-dark m-3 p-3">
                <div><img src="{{asset('img/time icon.png')}}" alt="icon"></div>
                <div><p>Temps d'infusion</p></div>
            </div>
            <div class="col-2 border border-dark m-3 p-3">
                <div><img src="{{asset('img/tea cup icon.png')}}" alt="icon"></div>
                <div><p>Dosage</p></div>
            </div>
            <div class="col-2 border border-dark m-3 p-3">
                <div><img src="{{asset('img/temperature icon.png')}}" alt="icon"></div>
                <div><p>Température d'infusion</p></div>
            </div>
            <div class="col-2 border border-dark m-3 p-3">
                <div><img src="{{asset('img/moment icon.png')}}" alt="icon"></div>
                <div><p>Moment de la journée</p></div>
            </div>
        </div>
        <div>
            <div class="border-bottom border-dark">
                <h2>Description produit</h2>
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                    impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand
                    un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de
                    polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la
                    bureautique informatique, sans que son</p>
            </div>
            <div class="border-bottom border-dark">
                <h2>Suggestions de préparation H2</h2>
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                    impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand
                    un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de
                    polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la
                    bureautique informatique, sans que son</p>
            </div>
            <div class="border-bottom border-dark">
                <h2>Ingredients produit H2</h2>
                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                    impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand
                    un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de
                    polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la
                    bureautique informatique, sans que son</p>
            </div>
        </div>
        <div>
            <div><h2>Notre Sélection du Moment</h2></div>
            <div>
                @foreach ($products as $productSelection)
                    <div>
                        <img src="{{asset("/img/$productSelection->main_image")}}.jpeg" alt="">
                        <h3>{{$productSelection->name}}</h3>
                        <p>{{$productSelection->description}}</p>
                        <div>
                            <a href="{{route('product', ['product' => $productSelection->id])}}">Voir plus</a>
                            <form action="{{route('cart.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" value="{{$productSelection->id}}" name="id">
                                <input type="submit" name="submit" value="ajouter au panier">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div><h2>AVIS</h2></div>
            <div>
                <div><h2>Note globale</h2></div>
                <div class="avis border border-dark m-3 p-3">
                    <div>
                        <h2>Nom de l'acheteur</h2>
                        {{--                        must put the correct amount of stars--}}
                    </div>
                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                        impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500,
                        quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                        spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté
                        à la bureautique informatique, sans que son contenu n'en soi</p>
                </div>
                <div class="avis border border-dark m-3 p-3">
                    <div>
                        <h2>Nom de l'acheteur</h2>
                        {{--                        must put the correct amount of stars--}}
                    </div>
                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                        impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500,
                        quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                        spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté
                        à la bureautique informatique, sans que son contenu n'en soi</p>
                </div>
                <div class="avis border border-dark m-3 p-3">
                    <div>
                        <h2>Nom de l'acheteur</h2>
                        {{--                        must put the correct amount of stars--}}
                    </div>
                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                        impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500,
                        quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                        spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté
                        à la bureautique informatique, sans que son contenu n'en soi</p>
                </div>
            </div>
        </div>
    </div>
@endsection
