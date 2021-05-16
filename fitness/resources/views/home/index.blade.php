@extends('layout.master')

@section('main')
    <div class="body-style-1 background-color-2">
        <div class="row mt-2">
            <div class="col-lg-12 mx-auto">
                <h1 class="display-4 text-center background-color-3">Disponibles en Pandemia !!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 mx-auto container-style-2">
                <div class="container p-1 container-style-2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid d-inline carousel-img embed-responsive-item" src="{{asset('img/carousel_1.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid d-inline carousel-img embed-responsive-item" src="{{asset('img/carousel_2.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid d-inline carousel-img embed-responsive-item" src="{{asset('img/carousel_3.jpg')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid d-inline carousel-img embed-responsive-item" src="{{asset('img/carousel_4.jpg')}}" alt="four slide">
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container background-color-3 mt-4">
            <h3 class="text-white m-1 text-center text-dark">Productos Destacados</h3>
            <div class="m-3">
                <a href="#collapseOfertas" class="btn text-subtitle" data-toggle="collapse">Mejores Ofertas</a>
                <a href="#collapseMas" class="btn text-subtitle" data-toggle="collapse">Más Vendidos</a>
                <a href="#collapseNuevos" class="btn text-subtitle" data-toggle="collapse">Nuevos Productos</a>
            </div>
            <div class="accordion" id="acordeonProductos">
                <div class="collapse show" id="collapseOfertas" data-parent="#acordeonProductos">
                    <div class="container mb-1">
                        <div class="row p-1">
                            @foreach ($productosDesc as $producto)
                            <div class="col mb-2 col-xl-3">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{ route('productos.show', $producto->id) }}" class="d-block text-center">{{ $producto->nombre }}</a>
                                    </div>
                                    <img src="{{Storage::url($producto->imagenes->first()->ruta)}}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="d-block">$ {{ $producto->precio }}</h5>
                                        <h5 class="d-block">Descuento del <span style="background-color: yellow">{{ $producto->descuento }}%</span></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseNuevos" data-parent="#acordeonProductos">
                    <div class="container mb-1">
                        <div class="row p-1">
                            @foreach ($productosVend as $producto)
                            <div class="col mb-2 col-xl-3">
                                <div class="card">
                                    <div class="card-header">
                                        <p>{{ $producto->nombre }}</p>
                                    </div>
                                    <img src="{{Storage::url($producto->imagenes->first()->ruta)}}" class="card-img-top">
                                    <div class="card-body">
                                        <p>{{ $producto->precio }}$</p>
                                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver Producto</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>         
                <div class="collapse" id="collapseMas" data-parent="#acordeonProductos">
                    <div class="container mb-3">
                        <div class="row p-1">
                            @foreach ($productosCreat as $producto)
                            <div class="col mb-2 col-xl-3">
                                <div class="card">
                                    <div class="card-header">
                                        <p>{{ $producto->nombre }}</p>
                                    </div>
                                    <img src="{{Storage::url($producto->imagenes->first()->ruta)}}" class="card-img-top">
                                    <div class="card-body">
                                        <p>{{ $producto->precio }}</p>
                                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver Producto</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection