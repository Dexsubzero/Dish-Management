@extends('dashboard.layout')
@section('content')
    @include('partial.nav-about')  

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
@endsection