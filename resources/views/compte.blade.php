@extends('layouts.frontOffice')
@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Mon compte</h1>
            <p class="lead text-muted">Bienvenu sur votre compte utilisateur</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
            <p>
                <a href="#" class="btn btn-primary my-2">Mes commandes</a>
                <a href="#" class="btn btn-secondary my-2">Mes informations</a>

            </p>
        </div>
    </section>


@endsection
