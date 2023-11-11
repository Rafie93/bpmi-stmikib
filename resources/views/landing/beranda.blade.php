@extends('layouts.landing')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                @foreach ($slide as $item)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                        style="background-image: url({{ $item->image() }})">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">{{ $item->title }}</h2>
                                <p class="animate__animated animate__fadeInUp">{{ $item->description }}.</p>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        {{-- <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6">
                        <h2>Eum ipsam laborum deleniti velitena</h2>
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee
                            trave</h3>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequa</li>
                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                                voluptate velit</li>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in</li>
                        </ul>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>

            </div>
        </section> --}}


        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <div class="icon-box">
                            <i class="bi bi-calendar4-week"></i>
                            <h4><a href="#">Koordinasi Dan Pengendalian Mutu</a></h4>
                            <p>Badan Penjaminan Mutu Internal mengkoordinasikan dan mengendalikan penyelenggaraan kegiatan
                                di
                                lingkungan akademik</p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-card-checklist"></i>
                            <h4><a href="#">Pemantauan Dan Audit Mutu</a></h4>
                            <p>Badan Penjaminan Mutu Internal melaksanakan pemantauan, melaksanakan penilaian, melaksanakan
                                audit
                                dan melaksanakan pengendalian mutu di lingkungan akademik</p>
                        </div>
                    </div>
                    <div class="col-md-4  mt-md-0">
                        <div class="icon-box">
                            <i class="bi bi-bar-chart"></i>
                            <h4><a href="#">Peningkatan Mutu Dan Akreditasi</a></h4>
                            <p>Berkomitmen mengembangkan mutu penyelenggaraan akademik, serta berkomitmen meningkatkan
                                akreditasi institusi, program studi.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->


    </main><!-- End #main -->
@endsection
