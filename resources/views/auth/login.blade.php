@extends('layouts.app')

@section('content')
    <style>
        body {
            background-image: url('Assets/logo-pm/bg-login.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .judul {
            margin-top: 50px;
        }

        .bold-text {
            font-family: "Raleway", sans-serif;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Menambahkan bayangan teks */
        }

        /* Responsif untuk layar yang lebih kecil */
        @media (max-width: 1200px) {
            .judul {
                margin-top: 40px;
            }
        }

        @media (max-width: 992px) {
            .judul {
                margin-top: 30px;
            }

            .bold-text {
                font-size: 1.5rem;
                /* Sesuaikan ukuran font */
            }
        }

        @media (max-width: 768px) {
            .judul {
                margin-top: 20px;
            }

            .bold-text {
                font-size: 1.25rem;
                /* Sesuaikan ukuran font */
            }
        }

        @media (max-width: 576px) {
            .judul {
                margin-top: 10px;
            }

            .bold-text {
                font-size: 1rem;
                /* Sesuaikan ukuran font */
            }
        }
    </style>

    <body>
        <div class="contaner">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">

                    <div class="container">
                        <div class=" judul d-flex flex-column justify-content-center align-items-center text-center">
                            <h1 class="bold-text">SELAMAT DATANG DI APLIKASI MY-PEMUDAMU</h1>
                            <h3 class="bold-text">Aplikasi Database Anggota Pemuda Muhammadiyah Wonosobo</h3>
                        </div>

                    </div>

                    <!-- Content area -->
                    <div class="content d-flex justify-content-center align-items-center">

                        <!-- Login form -->
                        <form action="{{ route('login') }}" method="POST"> <!-- Sesuaikan route -->
                            @csrf
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('Assets/logo-pm/Logo-Pemuda-Muhammadiyah-1.png') }}"
                                            alt="" width="100px" height="100px">
                                        <h5 class="mb-0 mt-2">Login ke My-PemudaMu</h5>
                                        <span class="d-block text-muted">Masukan akun anda</span>
                                        @if ($errors->has('error'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('error') }}
                                            </div>
                                        @endif
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Username" required>
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="password" class="form-control" name="password" id="password" required
                                            placeholder="Password">
                                        <div class="form-control-feedback">
                                            <i class="icon-lock2 text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Masuk <i
                                                class="icon-circle-right2 ml-2"></i></button>
                                    </div>

                                    <div class="form-group">
                                        <a href="{{ route('home') }}" class="btn btn-secondary btn-block"><i
                                                class="icon-circle-left2 mr-2"></i>Kembali</a>
                                    </div>


                                </div>
                            </div>
                        </form>
                        <!-- /login form -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->
        </div>

    </body>
@endsection
