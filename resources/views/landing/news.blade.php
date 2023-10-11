@extends('layouts.landing')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Berita</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        @foreach ($data as $item)
                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ $item->image() }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    {{ $item->title }}}
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">Admin</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#"><time
                                                    datetime="{{ $item->created_at }}">{{ $item->created_at->format('D, d M Y') }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                href="#">{{ $item->be_read }} dibaca</a></li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    {!! substr($item->description, 0, 200) !!}

                                    <div class="read-more">
                                        <a href="{{ route('news.show', $item->id) }}">Read More</a>
                                    </div>
                                </div>

                            </article><!-- End blog entry -->
                        @endforeach




                        <div class="blog-pagination">
                            {{ $data->links() }}
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form method="get" action="{{ url()->current() }}">
                                    <input type="text" name="search" value="{{ Request('search') }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach ($category as $cat)
                                        <li><a href="{{ route('news', ['category' => $cat->category]) }}">{{ $cat->category }}
                                                <span>({{ $cat->count() }})</span></a></li>
                                    @endforeach

                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Populer Posts</h3>
                            <div class="sidebar-item recent-posts">

                                @foreach ($populer as $pop)
                                    <div class="post-item clearfix">
                                        <img src="{{ $pop->image() }}" alt="">
                                        <h4><a href="{{ route('news.show', $pop->id) }}">{{ $pop->title }}</a></h4>
                                        <time
                                            datetime="{{ $pop->created_at }}">{{ $pop->created_at->format('D, d M Y') }}</time>
                                    </div>
                                @endforeach

                            </div><!-- End sidebar recent posts-->


                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
