@extends('layouts.frontOffice')
@section('content')
    <div>
        <h1>Un thé bio et éthique</h1>
    </div>
    <div>
        <h2>Boutique de Thé Bio et Naturel</h2>
        <p>Découvrez notre boutique de thés bio naturels et éthiques en ligne : thé vert bio, thé noir bio, thé blanc
            bio, matcha bio, tisanes et rooibos sans théine bio, ainsi que nos pochettes vrac, biodégradables et
            compostables afin de recharger nos jolies boîtes métal décorées…</p>
    </div>
    <div>
        <h2>Notre Sélection du Moment</h2>
        @foreach ($products as $product)
            <div>
                <img src="{{asset("/img/$product->main_image")}}.jpeg" alt="">
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <div>
                    <a href="{{route('product', ['product' => $product->id])}}">Voir plus</a>
                    <form action="{{route('cart.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" value="{{$product->id}}" name="id">
                        <input type="submit" name="submit" value="ajouter au panier">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        <h2>Notre Histoire</h2>
        <img src="">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin, arcu volutpat dignissim
            rutrum, mauris metus congue metus, a elementum libero orci non nisl. Nunc cursus nunc erat, sed auctor metus
            volutpat eu. Aenean posuere mi vitae risus vulputate fermentum. Vestibulum magna massa, tincidunt pharetra
            elit volutpat, lacinia consequat lacus. Proin gravida nec magna nec placerat. Sed bibendum tortor sit amet
            elit dapibus, quis mattis ante finibus. Maecenas quis ligula eu sem consectetur rutrum vel eget dolor. Sed
            dolor felis, mattis sit amet sollicitudin quis, aliquam id nulla. Nunc dictum nisi nulla, ut lobortis lectus
            vestibulum quis. Nam eu rutrum metus, in rutru</p>
    </div>
    <div>
        <h2>Nos Engagements</h2>
        <img src="">
        <img src="">
    </div>
@endsection
