<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <title>Bonos</title>
   
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
  rel="stylesheet"
/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
@if (Route::has('login'))
                <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div> -->

                <div class="">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 d-block d-sm-none" 
      style="max-height:15em;min-height:15em;object-fit:cover;"
      src="{{ URL::asset('public/photos/'.$config->image1) }}"
       alt="First slide">
       <img class="d-block w-100 d-none d-md-block" 
      style="max-height:30em;min-height:30em;object-fit:cover;"
      src="{{ URL::asset('public/photos/'.$config->image1) }}"
       alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 d-block d-sm-none"
      style="max-height:15em;min-height:15em;object-fit:cover;"
      src="{{ URL::asset('public/photos/'.$config->image2) }}"
       alt="Second slide">
       <img class="d-block w-100 d-none d-md-block" 
      style="max-height:30em;min-height:30em;object-fit:cover;"
      src="{{ URL::asset('public/photos/'.$config->image2) }}"
       alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 d-block d-sm-none"
      style="max-height:15em;min-height:15em;object-fit:cover;"
      src="{{ URL::asset('public/photos/'.$config->image3) }}"
        alt="Third slide">
        <img class="d-block w-100 d-none d-md-block" 
      style="max-height:30em;min-height:30em;object-fit:cover;"
      src="{{ URL::asset('public/photos/'.$config->image3) }}"
       alt="First slide">
    </div>
  </div>
 
</div>
</div>
<div class="container mt-4" > 
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{ $config->title }}</h1>
    <p class="lead">{{ $config->subtitle }}</p>
  </div>
</div>
</div>

<p class="text-center">
    <a href="{{ route('login') }}" class="  btn btn-success">Inicia Sesión</a>
    <a href="{{ route('register') }}" class="  btn btn-primary">
        Registrarme
    </a>

</p>

<div class="container">
    <h2 style="margin:2.5em 0em;">Conoce los premios que tenemos para ti</h2>
    
    <div class="row">
        @foreach($latestRewards as $reward)
        <div class="col-md-4">
            <div class="card" >
                <img class="card-img-top image-responsive" style="min-height:19em;max-height:19em;object-fit: cover;" src="{{ URL::asset('public/photos/'.$reward->photos) }}" 
                 alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$reward->name}}</h5>
                    <p class="card-text">{!! $reward->description !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<h2 class="text-center mt-4">¡Registrate ya!</h2>
<p class="text-center">

    <a href="{{ route('register') }}" class="  btn btn-primary">
        Registrarme
    </a>
</p>

    
            @endif
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$('.carousel').carousel({
interval: 2500,
ride:true
})
</script>

</body>
</html>