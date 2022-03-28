@extends('layouts.frontOffice')
@section('content')
    @foreach ($products as $id => $product)
        <h3>{{$product['product']->name}}</h3>
        <div>
            <p>{{$product['product']->all_taxes_included_price}}€</p>
            <form action="{{route('cart.update')}}" method="post">
                @csrf
                @method('PUT')
                <input type="number" min="0" max="{{$product['product']->stock}}" value="{{$product['qty']}}" name="quantity">
                <input type="hidden" value="{{$id}}" name="id">
                <input type="submit" value="modifier">
            </form>
            <form action="{{route('cart.destroy')}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <input type="submit" name="delete" value="Supprimer">
            </form>
            <p>Total produit : {{$product['total']}} €</p>
        </div>
    @endforeach
    <p>Total : {{$total}} €</p>
@endsection
