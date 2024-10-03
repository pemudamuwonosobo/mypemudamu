 <!-- Main navigation -->
 <div class="card card-sidebar-mobile">
     <ul class="nav nav-sidebar" data-nav-type="accordion">

         <!-- Main -->

         <li class="nav-item">
             <a href="/dashboard" class="nav-link {{ Request::is(['dashboard']) ? 'active' : '' }}">
                 <i class="icon-home4"></i>
                 <span>
                     Dashboard
                 </span>
             </a>
         </li>

         <li
             class="nav-item nav-item-submenu {{ Request::is(['pendidikan', 'anggota', 'perkaderan', 'organisasi, report']) ? 'nav-item-expanded nav-item-open' : '' }}">
             <a href="#" class="nav-link"><i class="icon-users"></i>
                 <span>Anggota</span></a>

             <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                 <li class="nav-item"><a href="/anggota"
                         class="nav-link {{ Request::is(['anggota']) ? 'active' : '' }}">Profil Anggota</a></li>
                 @if (Auth::user()->role_id == 1)
                     <li class="nav-item"><a href="/pendidikan"
                             class="nav-link {{ Request::is(['pendidikan']) ? 'active' : '' }}">Riwayat Pendidikan </a>
                     </li>
                     <li class="nav-item"><a href="/perkaderan"
                             class="nav-link {{ Request::is(['perkaderan']) ? 'active' : '' }}">Riwayat Perkaderan</a>
                     </li>
                     <li class="nav-item"><a href="/organisasi"
                             class="nav-link {{ Request::is(['organisasi']) ? 'active' : '' }}">Riwayat Organisasi</a>
                     </li>
                 @endif
                 <li class="nav-item"><a href="/report"
                         class="nav-link {{ Request::is(['report']) ? 'active' : '' }}">Report</a>
                 </li>
             </ul>
         </li>
         {{-- <li
             class="nav-item nav-item-submenu {{ Request::is(['event', 'presensi']) ? 'nav-item-expanded nav-item-open' : '' }}">
             <a href="#" class="nav-link"><i class="icon-calendar2"></i>
                 <span>Event</span></a>

             <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                 <li class="nav-item"><a href="/event"
                         class="nav-link {{ Request::is(['event']) ? 'active' : '' }}">Event</a></li>

             </ul>
         </li> --}}
         @if (Auth::user()->role_id == 1)
             <li class="nav-item">
                 <a href="/event" class="nav-link {{ Request::is(['event']) ? 'active' : '' }}">
                     <i class="icon-calendar2"></i>
                     <span>
                         Event
                     </span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{ url('cabang_ranting') }}"
                     class="nav-link {{ Request::is(['cabang_ranting']) ? 'active' : '' }}">
                     <i class="icon-grid5"></i>
                     <span>
                         Cabang / Ranting
                     </span>
                 </a>
             </li>
             <!-- /main -->

             <!-- Forms -->
             <li
                 class="nav-item nav-item-submenu {{ Request::is(['gol_darah', 'profesi', 'pekerjaan', 'user', 'role']) ? 'nav-item-expanded nav-item-open' : '' }}">
                 <a href="#" class="nav-link"><i class="icon-cogs"></i> <span>Setting</span></a>

                 <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                     <li class="nav-item"><a href="{{ url('gol_darah') }}"
                             class="nav-link {{ Request::is(['gol_darah']) ? 'active' : '' }}">Golongan
                             Darah</a></li>
                     <li class="nav-item"><a href="{{ url('profesi') }}"
                             class="nav-link {{ Request::is(['profesi']) ? 'active' : '' }}">Profesi</a>
                     </li>
                     <li class="nav-item"><a href="{{ url('pekerjaan') }}"
                             class="nav-link {{ Request::is(['pekerjaan']) ? 'active' : '' }}">Pekerjaan</a>
                     </li>
                     {{-- <li class="nav-item"><a href="#" class="nav-link">Organisasi</a></li> --}}
                     {{-- <li class="nav-item"><a href="#" class="nav-link">Tingkat Organisasi</a></li> --}}
                     <li class="nav-item"><a href="{{ url('user') }}"
                             class="nav-link {{ Request::is(['user']) ? 'active' : '' }}">User</a>
                     </li>
                     <li class="nav-item"><a href="{{ url('role') }}"
                             class="nav-link {{ Request::is(['role']) ? 'active' : '' }}">Role</a></li>
                 </ul>
             </li>
         @endif
         </li>
         <!-- /forms -->

     </ul>
 </div>
 <!-- /main navigation -->
