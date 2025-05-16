@extends('dashboard.layout')
@section('content')
    @include('partial.nav-menu')
    <div class="container-xxl py-5">
        <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">FareSync Menu</h1>
          </div>

          <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
              <div class="product h-100">
                <a href="#" class="img-prod">
                  <img class="img-fluid" src="img/bg-hero.jpg" alt="Steak" style="height: 200px;">
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center" style="background-color: #0B172B;">
                  <h3><a href="#">Steak</a></h3>
                  <div class="d-flex justify-content-center">
                    <div class="pricing">
                      <p class="price"><span class="price-dc">$80.00</span></p>
                    </div>
                  </div>
                  <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                      <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                        <span><i class="fas fa-bars"></i></span>
                      </a>
                      <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                        <span><i class="fas fa-cart-plus"></i></span>
                      </a>
                      <a href="#" class="heart d-flex justify-content-center align-items-center">
                        <span><i class="fas fa-heart"></i></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add more menu items here -->
          </div>
        </div>
    </div>
    <!-- Menu End -->
    @include('dashboard.footer')
@endsection
