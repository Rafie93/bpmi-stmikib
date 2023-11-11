  <aside class="left-sidebar bg-sidebar">
      <div id="sidebar" class="sidebar">
          <!-- Aplication Brand -->
          <div class="app-brand">
              <a href="/" title="Beranda">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                      height="33" viewBox="0 0 30 33">
                      <g fill="none" fill-rule="evenodd">
                          <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                          <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                      </g>
                  </svg>

                  <span class="brand-name text-truncate">BPMI Dashboard</span>
              </a>
          </div>

          <!-- begin sidebar scrollbar -->
          <div class="" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="{{ route('backend.home') }}">
                          <i class="mdi mdi-view-dashboard-outline"></i>
                          <span class="nav-text">Dashboard</span>
                      </a>


                  </li>

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="{{ route('backend.news') }}">
                          <i class="mdi mdi-pencil-box-multiple"></i>
                          <span class="nav-text">Berita</span>
                      </a>

                  </li>

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="{{ route('backend.slider') }}">
                          <i class="mdi mdi-play-box-outline"></i>
                          <span class="nav-text">Slider</span>
                      </a>

                  </li>

                  <!-- <li class="section-title">
                  UI Elements
                </li> -->

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#about"
                          aria-expanded="false" aria-controls="components">
                          <i class="mdi mdi-folder-multiple-outline"></i>
                          <span class="nav-text">About BPMI</span> <b class="caret"></b>
                      </a>

                      <ul class="collapse " id="about" data-parent="#sidebar-menu">
                          <div class="sub-menu">
                              @foreach (aboutMenu() as $key => $item)
                                  <li><a class="sidenav-item-link" href="/backend/about/{{ $key }}"><span
                                              class="nav-text">{{ $item }}</span></a></li>
                              @endforeach
                          </div>
                      </ul>
                  </li>

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                          aria-expanded="false" aria-controls="icons">
                          <i class="mdi mdi-file-document"></i>
                          <span class="nav-text">Dokumen</span> <b class="caret"></b>
                      </a>

                      <ul class="collapse " id="icons" data-parent="#sidebar-menu">
                          <div class="sub-menu">
                              @foreach (dokumenMenu() as $key => $item)
                                  <li><a class="sidenav-item-link" href="/backend/dokumen/{{ $key }}"><span
                                              class="nav-text">{{ $item }}</span></a></li>
                              @endforeach
                          </div>
                      </ul>
                  </li>

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms"
                          aria-expanded="false" aria-controls="forms">
                          <i class="mdi mdi-email-mark-as-unread"></i>
                          <span class="nav-text">Monev</span> <b class="caret"></b>
                      </a>

                      <ul class="collapse " id="forms" data-parent="#sidebar-menu">
                          <div class="sub-menu">
                              @foreach (monevMenu() as $key => $item)
                                  <li><a class="sidenav-item-link" href="/backend/monev/{{ $key }}"><span
                                              class="nav-text">{{ $item }}</span></a></li>
                              @endforeach
                          </div>
                      </ul>
                  </li>

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                          data-target="#tables" aria-expanded="false" aria-controls="tables">
                          <i class="mdi mdi-table"></i>
                          <span class="nav-text">Akreditasi</span> <b class="caret"></b>
                      </a>

                      <ul class="collapse" id="tables" data-parent="#sidebar-menu">
                          <div class="sub-menu">
                              @foreach (akreditasiMenu() as $key => $item)
                                  <li><a class="sidenav-item-link"
                                          href="/backend/akreditasi/{{ $key }}"><span
                                              class="nav-text">{{ $item }}</span></a></li>
                              @endforeach
                          </div>
                      </ul>
                  </li>

                  <li class="has-sub ">
                      <a class="sidenav-item-link" href="{{ route('backend.user') }}">
                          <i class="mdi mdi-account-edit"></i>
                          <span class="nav-text">user</span>
                      </a>

                  </li>

              </ul>
          </div>


      </div>
  </aside>
