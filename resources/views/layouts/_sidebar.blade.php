<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="https://storage.googleapis.com/jobhunstorage/assets/images/web/cropped-logo-jobhun-3.png" alt=""
                srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>

                @if(Auth::user())
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li
                    class="sidebar-item  has-sub {{ request()->routeIs('buku.index') ||  request()->routeIs('pengguna.index') ||  request()->routeIs('peminjaman.index') ||  request()->routeIs('pengembalian.index') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Data Perpustakaan</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="{{route('buku.index')}}">
                                <span>Data Buku</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('pengguna.index')}}">Data Pengguna</a>
                        </li>
                        <li>
                            <a href="{{route('peminjaman.index')}}">Data Peminjaman</a>
                        </li>
                        <li>
                            <a href="{{route('pengembalian.index')}}">Data Pengembalian</a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>