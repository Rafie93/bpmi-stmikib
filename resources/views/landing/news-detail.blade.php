@extends('layouts.landing')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $data->category }}</h2>

                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-12 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{ $data->image() }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                {{ $data->title }}
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">Admin</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="#"><time
                                                datetime="2020-01-01">{{ $data->created_at->format('D, d M Y') }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="#">{{ $data->be_read }} dibaca</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                {!! $data->description !!}
                            </div>

                        </article><!-- End blog entry -->


                    </div><!-- End blog entries list -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->
@endsection
