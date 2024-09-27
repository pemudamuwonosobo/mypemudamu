<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="/dashboard">
            <img src="{{ asset('Assets/logo-pm/LOGO-PEMUDAMU.png') }}" alt="">
            {{-- <img src="{{ asset('limitless/global_assets/images/logo.png') }}" alt=""> --}}
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>

        </ul>

        <span class="navbar-text ml-md-3 mr-md-auto">
            {{-- <span class="badge bg-success">Online</span> --}}
        </span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle"
                        alt="">

                    @if (Auth::user()->role_id == 1)
                        <span>SUPERADMIN</span>
                    @elseif (Auth::user()->role_id == 2)
                        <span>ADMIN DAERAH</span>
                    @else
                        <span> ADMIN PCPM
                            {{ auth()->user()->cabangs->cabang_nm ?? '' }}</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span
                            class="badge badge-pill bg-blue ml-auto">58</span></a>
                    <div class="dropdown-divider"></div> --}}
                    <a href="{{ route('changePassword') }}" class="dropdown-item">
                        <i class="icon-cog5"></i> Ubah Password
                    </a>
                    <a href="/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>

        </ul>

    </div>
</div>
<!-- /main navbar -->
