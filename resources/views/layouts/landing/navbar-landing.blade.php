<nav id="navbar" class="navbar">
    <ul>
        <li><a href="{{ route('beranda') }}"
                class="{{ Request::segment(1) == '' || Request::segment(1) == 'beranda' ? 'active' : '' }}">Beranda</a>
        </li>
        <li><a href="{{ route('news') }}" class="{{ Request::segment(1) == 'news' ? 'active' : '' }}">Berita</a></li>


        <li class="dropdown {{ Request::segment(1) == 'about' ? 'active' : '' }}"><a href="#"><span
                    class=" {{ Request::segment(1) == 'about' ? 'active' : '' }}">Tentang
                    BPMI</span> <i
                    class="bi bi-chevron-down {{ Request::segment(1) == 'about' ? 'active' : '' }}"></i></a>
            <ul>
                @foreach (aboutMenu() as $key => $item)
                    <li><a href="/about/{{ $key }}">{{ $item }}</a></li>
                @endforeach

            </ul>
        </li>

        <li class="dropdown"><a href="#"><span
                    class=" {{ Request::segment(1) == 'dokumen' ? 'active' : '' }}">Dokumen Digital</span> <i
                    class="bi
                    bi-chevron-down"></i></a>
            <ul>
                @foreach (dokumenMenu() as $key => $item)
                    @if ($key == 'spmi')
                        <li class="dropdown"><a href="#"><span>SPMI</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                @foreach (spmiMenu() as $key2 => $item2)
                                    <li><a href="/dokumen/{{ $key2 }}">{{ $item2 }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                    @else
                        <li><a href="/dokumen/{{ $key }}">{{ $item }}</a></li>
                    @endif
                @endforeach

            </ul>
        </li>
        <li class="dropdown"><a href="#"><span
                    class=" {{ Request::segment(1) == 'monev' ? 'active' : '' }}">Monev</span> <i
                    class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach (monevMenu() as $key => $item)
                    <li><a href="/monev/{{ $key }}">{{ $item }}</a></li>
                @endforeach

            </ul>
        </li>
        <li class="dropdown"><a href="#"><span
                    class=" {{ Request::segment(1) == 'akreditasi' ? 'active' : '' }}">Akreditasi</span> <i
                    class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach (akreditasiMenu() as $key => $item)
                    <li><a href="/akreditasi/{{ $key }}">{{ $item }}</a></li>
                @endforeach

            </ul>
        </li>

        <li><a href="{{ Route('login') }}" class="getstarted">MASUK</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
