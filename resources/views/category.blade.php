@extends('layouts.frontOffice')
@section('content')
    <h1>{{$category->name}}</h1>
    @foreach($category->products as $product)
        <div>
            <img src="">
            <h3>{{$product->name}}</h3>
            <p>{{$product->description}}</p>
            <p>{{$product->net_price*(1+($product->VAT/100))}}€ TTC</p>
            <div>
                <a href="/produits/{{$product->id}}">Voir plus...</a>
                <form action="{{route('cart.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" value="{{$product->id}}" name="id">
                    <input type="submit" name="submit" value="ajouter au panier">
                </form>
            </div>
        </div>
    @endforeach
@endsection
