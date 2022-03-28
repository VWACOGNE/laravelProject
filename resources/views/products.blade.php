@extends('layouts.frontOffice')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>
    @foreach($products as $product)
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
