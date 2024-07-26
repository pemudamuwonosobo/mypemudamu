<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#"><img src="{{ asset('Assets/logo-pm/Logo-Pemuda-Muhammadiyah-1.png') }}"
                                    width="38" height="38" class="rounded-circle" alt=""></a>
                        </div>

                        <div class="media-body">

                            @if (Auth::user()->role_id == 1)
                                <div class="media-title font-weight-semibold">SUPERADMIN</div>
                            @elseif (Auth::user()->role_id == 2)
                                <div class="media-title font-weight-semibold">ADMIN DAERAH</div>
                            @else
                                <div class="media-title font-weight-semibold"> ADMIN PCPM
                                    {{ auth()->user()->cabangs->cabang_nm ?? '' }}</div>
                            @endif



                            <div class="media-title font-weight-semibold">
                                <div class="font-size-xs opacity-50">
                                    @if (Auth::user()->role_id == 1)
                                        superadmin@pemudamu.com
                                    @elseif (Auth::user()->role_id == 2)
                                        admindaerah@pemudamucom
                                    @else
                                        {{ auth()->user()->email ?? '' }}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user menu -->


            @include('components.layouts.part-layout.menu')

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->
