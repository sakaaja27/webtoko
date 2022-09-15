 @extends('layouts.main')
 <section id="hero" class="hero">

  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 data-aos="fade-down">Welcome to <span>King MotoCars</span></h2>
          <p data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
        </div>
      </div>
    </div>
  </div>

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-item active" style="background-image: url(/img/1car.jpg)"></div>
    <div class="carousel-item" style="background-image: url(/img/2car.jpg)"></div>
    <div class="carousel-item" style="background-image: url(/img/3car.jpg)"></div>
    <div class="carousel-item" style="background-image: url(/img/4car.jpg)"></div>
    <div class="carousel-item" style="background-image: url(/img/5car.jpg)"></div>

    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>

</section><!-- End Hero Section -->
@section('container')
<div class="categories">
  <div class="small-container">
    <div class="row">
      <div class="col-3">
        <video  autoplay loop muted src="/img/supercar_001.mp4"></video>
      </div>
      <div class="col-3">
        <h1>we are here in Indonesia with our supercars.</h1>
      </div>
    </div>
  </div>
</div>
<!-- ======= Cars Section ======= -->
<section id="constructions" class="constructions">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Report Toko</h2>
      <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
    </div>

    <div class="row gy-4">

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold  text-uppercase mb-1">
              All Employe</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold  text-uppercase mb-1">
              Report harian</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold  text-uppercase mb-1">
              Report bulanan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

</div>
</section><!-- End Constructions Section -->
@endsection