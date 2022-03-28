@extends('layouts.app')
@section('content')
    <h1>Le produit a bien été supprimé</h1>
    <a href="{{route('dashboard')}}">Retourner au dashboard</a>
    <a href="{{route('dashboard.products')}}">Voir tous les produits</a>
@endsection
