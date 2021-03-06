@extends('landing-page.index')

@section('content')
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <a href="#" class="logo mr-auto"><img src="{{ asset('storage/frontend/'.$frontend->logo) }}" alt="" class="img-fluid"></a>
          <br>
          <h1 class="mb-5" style="font-size: 54px;">{{ $frontend->school_name }}</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-12 mb-2 mb-md-0">
                <h5>{{ $frontend->slogan }}</h5>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-users m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->students }}</h3>
            <p class="lead mb-0">Peserta Didik</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-user-plus m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->educator }}</h3>
            <p class="lead mb-0">Pendidik</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-user-secret m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->teacher }}</h3>
            <p class="lead mb-0">Tenaga Kependidikan</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->course }}</h3>
            <p class="lead mb-0">Mata Pelajaran</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('storage/frontend/'.$frontend->content1_photo) }}');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>{{ $frontend->content1_title }}</h2>
          <p class="lead mb-0">{{ $frontend->content1_body }}</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ asset('storage/frontend/'.$frontend->content2_photo) }}');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>{{ $frontend->content2_title }}</h2>
          <p class="lead mb-0">U{{ $frontend->content2_body }}</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('storage/frontend/'.$frontend->content3_photo) }}');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>{{ $frontend->content3_title }}</h2>
          <p class="lead mb-0">{{ $frontend->content3_body }}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light" id="profile">
    <div class="container">
      <h2 class="mb-5">Profil Sekolah</h2>
      <div class="row">
        <div class="col-lg-4">
            <img class="img-fluid rounded-circle" src="{{ asset('storage/frontend/'.$frontend->profile1_photo) }}" alt="" style="height: 200px; width: 200px;">
            <h5>{{ $frontend->profile1_title }}</h5>
            <p class="font-weight-light mb-0">{{ $frontend->profile1_body }}</p>
        </div>
        <div class="col-lg-4">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('storage/frontend/'.$frontend->profile2_photo) }}" alt="" style="height: 200px; width: 200px;">
            <h5>{{ $frontend->profile2_title }}</h5>
            <p>- Kepala Sekolah - </p>
            <p class="font-weight-light mb-0">{{ $frontend->profile2_body }}</p>
        </div>
        <div class="col-lg-4">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('storage/frontend/'.$frontend->profile3_photo) }}" alt="" style="height: 200px; width: 200px;">
            <h5>{{ $frontend->profile3_title }}</h5>
            <p class="font-weight-light mb-0">{{ $frontend->profile3_body }}</p>
        </div>
      </div>
    </div>
  </section>

  @endsection