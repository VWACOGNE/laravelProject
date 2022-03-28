<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Théduo</title>
</head>

<body>
<header>
    <div class="container">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
            <div class="nav-item">
                <a class="nav-link active" aria-current="page"
                   href="/compte">@if(Auth::check()){{Auth::user()->name}}@else mon Compte @endif</a>
            </div>
            <div class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('cart')}}">mon Panier</a>
            </div>
        </form>

    </div>
    <div class="text-center"><img src="{{asset('img/ThéduoNoirHorizontal.png')}}" alt="logo Theduo"></div>
    <div class="container d-flex">
        <div class="nav-item text-center">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Accueil</a>
        </div>
        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('categories')}}">Catalogue</a>
        </div>
        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Accesoires</a>
        </div>
        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Sélection Théduo</a>
        </div>
        <div class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Notre Histoire</a>
        </div>
    </div>
</header>
<div class="container">
    @yield('content')
</div>
<footer class="container">

    <div class="container d-flex bg-primary p-4">
        <div class="col text-center">
            <img src="{{asset('img/secrue icon.png')}}" alt="fezfzef">
            <h4>PAIEMENT SÉCURISÉ</h4>
        </div>
        <div class="col text-center">
            <img src="{{asset('img/delivery icon.png')}}" alt="fezfzef">
            <h4>LIVRAISON OFFERTE</h4>
        </div>
        <div class="col text-center">
            <img src="{{asset('img/samples icon.png')}}" alt="fezfzef">
            <h4>ÉCHANTILLONS OFFERT</h4>
        </div>
        <div class="col text-center">
            <img src="{{asset('img/pick-up-icon.png')}}" alt="fezfzef">
            <h4>LIVRAISON<br>POINT RELAIS</h4>
        </div>
        <div class="col text-center">
            <img src="{{asset('img/customer service icon.png')}}" alt="fezfzef">
            <h4>SERVICE<br>CLIENT</h4>
        </div>
        <div class="col text-center">
            <img src="{{asset('img/quality icon.png')}}" alt="fezfzef">
            <h4>GARANTIE QUALITÉ</h4>
        </div>
    </div>
    <div class="container-sm row p-4 border">
        <div class="container col-6">
            <div class="text-center">
                <h3>suivez nous</h3>
            </div>
            <div class="container row">
                <div class="col">
                    <img src="{{asset('img/facebook.png')}}" alt="logo facebook">
                </div>
                <div class="col">
                    <img src="{{asset('img/twitter.png')}}" alt="logo twitter">
                </div>
                <div class="col">
                    <img src="{{asset('img/linkedin.png')}}" alt="logo linkedin">
                </div>
                <div class="col">
                    <img src="{{asset('img/pinterest.png')}}" alt="logo pinterest">
                </div>
                <div class="col">
                    <img src="{{asset('img/instagram.png')}}" alt="logo instagram">
                </div>
            </div>
        </div>
        <div class="container col-6">
            <div class="text-center">
                <h3>Tenez-vous informé(e) de l’actualité du site en abonnant a la newletter</h3>
            </div>
            <div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="saisissez votre addresse"
                           aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">OK</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <img src="{{asset('img/ThéduoNoirHorizontal.png')}}" alt="logo Theduo">
        <br><br>
        <p>© - Theduo <br><br> Livraison standars à domicile et en point relais </p>
    </div>
</footer>
</body>

</html>
