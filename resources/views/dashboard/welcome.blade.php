@extends('dashboard.layout')

@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0"
                style="border-bottom: 2px solid white;">
                <a href="{{ route('dashboard.welcome') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fas fa-utensils"></i>{{ config('app.name') }}</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('dashboard.welcome') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('directory.services')}}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('directory.menu')}}" class="nav-item nav-link">Menu</a>
                        <a href="{{ route('directory.about')}}" class="nav-item nav-link">About</a>
                        <a href="{{ route('directory.contacts')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="/login" class="btn btn-primary"style="margin-right: 10px;">Log in</a>
                    <a href="/register" class="btn btn-primary">Sign up</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Please log in or register to access
                                content.
                            </h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"></p>
                            <a href="{{ route('directory.cart') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft"><i
                                    class="fas fa-cart-plus"></i> Cart</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


              <!-- Learn sections -->
       <section id="learn" class="p-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md">
                        <img src="{{ asset('img/faresync.png') }}" class="img-fluid" alt="fundamentals">
                    </div>
                    <div class="col-md p-5">
                        <h2>Learn more about FareSync</h2>
                        <p class="lead">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi, earum corrupti quibusdam ad quaerat unde.
                        </p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis nihil, quos corporis molestiae expedita at minima aspernatur atque beatae architecto dolore reprehenderit autem eum fugiat cupiditate amet, nesciunt, numquam vel.
                        </p>
                        <a href="{{ route('register') }}" class="btn btn-light mt-3">
                           <i class="bi bi-chevron-right"></i> Sign Up
                        </a>
                    </div>
                </div>
            </div>
       </section>

       <section id="learn" class="p-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>Learn React</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi, earum corrupti quibusdam ad quaerat unde.
                    </p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis nihil, quos corporis molestiae expedita at minima aspernatur atque beatae architecto dolore reprehenderit autem eum fugiat cupiditate amet, nesciunt, numquam vel.
                    </p>
                    <a href="{{ route('login') }}" class="btn btn-light mt-3">
                       <i class="bi bi-chevron-right"></i> Login
                    </a>
                </div>
                <div class="col-md">
                    <img src="{{ asset('img/logo-no-bg.png') }}" class="img-fluid" alt="fundamentals">
                </div>
            </div>
        </div>
   </section>

        @include('dashboard.footer')
