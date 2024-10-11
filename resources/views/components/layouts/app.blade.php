@include('components.layouts.part-layout.header')
@if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
    @include('components.layouts.part-layout.main-navbar')
    @include('components.layouts.part-layout.sidebar')
@endif
@if (Auth::user()->role_id == 4)
    @include('components.layouts.part-layout.main-navbar-client')
@endif
<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="{{ url('/') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                            Home</a>
                        <span class="breadcrumb-item active">{{ $title }} </span>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

            </div>
        </div>
    @endif
    <!-- /page header -->
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                @include('components.layouts.part-layout.content')
            </div>



        </div>
    </div>
    <!-- /main content -->
    @if (!Route::is(['register', 'login', 'client']))
        @include('components.layouts.part-layout.footer')
    @endif
