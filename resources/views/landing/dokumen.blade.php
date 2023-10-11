@extends('layouts.landing')
@section('content')
    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>{{ $title }}</h2>
                </div>

            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-12 entries">

                        @forelse ($data as $item)
                            <article class="entry entry-single">
                                <div class="entry-content">
                                    <a href="{{ $item->files() }}" target="_blank"
                                        rel="noopener noreferrer">{{ $item->title }}</a>
                                </div>

                            </article>
                        @empty
                            <article class="entry entry-single">
                                <blockquote>
                                    <p>
                                        Data tidak ditemukan
                                    </p>
                                </blockquote>
                            </article>
                        @endforelse

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
