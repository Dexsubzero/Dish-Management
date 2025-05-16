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
                <a href="{{ route('dashboard.home') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fas fa-utensils"></i>{{ config('app.name') }}</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('dashboard.home') }}" class="nav-item nav-link active">Home</a>
                        <a href="/services" class="nav-item nav-link">Service</a>
                        <a href="/menu" class="nav-item nav-link">Menu</a>
                        <a href="/contacts" class="nav-item nav-link">Contact</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger mt-3" type="submit">Logout</button>
                    </form>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">"FareSync – Where Flavors Connect!"
                            </h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2"></p>
                            <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft"><i
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

        <section class="py-5 text-center" style="background-color: #ffe5b4;">
            <div class="container">
              <h1 class="display-4 text-orange" style="color: #FF9C00;">About Us</h1>
              <p class="lead" style="color: #FF9C00;">Bringing people together through flavors, freshness, and food stories.</p>
            </div>
          </section>

          <!-- Main Content -->
          <section class="py-5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="card shadow-lg border-0" style="border-left: 5px solid #ff6600;">
                    <div class="card-body">
                      <h3 class="card-title" style="color: #FF9C00;">Welcome to FareSync</h3>
                      <p class="card-text">
                        FareSync is your digital companion in the world of food and drinks—curating experiences, recipes, and flavors from kitchens and cafes around the globe.
                        Whether you’re a foodie, a chef, or just someone looking for your next favorite meal, FareSync connects you with tastes that inspire.
                      </p>
                      <p class="card-text">
                        From exploring street food culture to discovering hidden gems in the culinary world, we’re all about syncing your cravings with authentic, exciting finds.
                        Expect mouthwatering content, drink pairings, kitchen tips, and seasonal favorites—all in one place.
                      </p>
                      <p class="card-text">
                        Our content features: <strong>Recipes, Restaurant Guides, Drink Reviews, Cooking Tips, Food Trends</strong>, and more.
                      </p>
                      <p class="card-text">
                        Come explore with us and experience the flavor journey. Let’s eat, drink, and sync up!
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

        @include('dashboard.footer')
