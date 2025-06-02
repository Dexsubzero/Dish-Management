 <!-- Navbar & Hero Start -->
 <div class="container-xxl position-relative p-0">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0"
         style="border-bottom: 2px solid white;">
         <a href="" class="navbar-brand p-0">
             <h1 class="text-primary m-0"><i class="fas fa-utensils"></i>{{ config('app.name') }}</h1>
             <!-- <img src="img/logo.png" alt="Logo"> -->
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="fa fa-bars"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto py-0 pe-4">
                 <a href="{{ route('dashboard.home', ['id' => Auth::id()]) }}" class="nav-item nav-link">Home</a>
                 <a href="{{ route('directory.services')}}" class="nav-item nav-link">Service</a>
                 <a href="{{ route('directory.menu')}}" class="nav-item nav-link">Menu</a>
                 <a href="{{ route('directory.about')}}" class="nav-item nav-link">About</a>
                 <a href="{{ route('directory.contacts')}}" class="nav-item nav-link active">Contact</a>
             </div>
             <form action="{{ route('logout') }}" method="POST">
                 @csrf
                 <button class="btn btn-danger" type="submit">Logout</button>
             </form>
         </div>
     </nav>

     <div class="container-xxl py-5 bg-dark hero-header mb-5">
         <div class="container my-5 py-5">
             <div class="row align-items-center g-5">
                 <div class="col-lg-6 text-center text-lg-start">
                     <h1 class="display-3 text-white animated slideInLeft">Please Contact us if there's any question!
                     </h1>
                     <p class="text-white animated slideInLeft mb-4 pb-2"></p>
                     <a href="{{ route('directory.cart') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft"><i
                        class="fas fa-cart-plus"></i> Cart</a>
                 </div>
                 <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                     <img class="img-fluid" src="{{ asset('img/hero.png') }}" alt="">
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Navbar & Hero End -->
