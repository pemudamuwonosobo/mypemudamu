<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="Name of your web site">
    <meta name="author" content="Marketify">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>My-PemudaMu | PDPM Wonosobo</title>

    <!-- STYLES -->
    <link rel="icon" href="{{ asset('Assets\favicon.png') }}" type="image/x-icon">

    <!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\global_assets\css\icons\icomoon\styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">

    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\colors.min.css') }}" rel="stylesheet"
        type="text/css">


    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">


    {{-- <link rel="stylesheet" type="text/css" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" href="css/rtl.css" />
    <link rel="stylesheet" type="text/css" href="css/colors.css" />
    <link rel="stylesheet" type="text/css" href="css/darkMode.css" />
    <link rel="stylesheet" type="text/css" href="css/onePage.css" />
    <link rel="stylesheet" type="text/css" href="css/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" /> --}}
    <link href="{{ asset('Shane\html\css\plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Shane\html\css\rtl.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Shane\html\css\colors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Shane\html\css\darkMode.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('Shane\html\css\onePage.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Shane\html\css\elements.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('Shane\html\css\style.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('Shane\html\js\modernizr.custom.js') }}"></script>
    <!-- /STYLES -->

</head>

<body>
    <!-- DARK MODE: add class "dark" Example: <body class="dark"> RTL MODE: add class "rtl" Example: <body class="rtl"> -->



    <!-- WRAPPER ALL -->
    <div class="shane_tm_all_wrap" data-magic-cursor="show" data-color="crimson" data-menu-position=""
        data-menu-style="">


        <!-- MENU -->
        <div class="shane_tm_menu">
            <ul>
                <li class="active">
                    <a href="#home">
                        <img class="svg" src="{{ asset('Shane/html/img/svg/home-run.svg') }}" alt="" />
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#about">
                        <img class="svg" src="{{ asset('Shane/html/img/svg/avatar.svg') }}" alt="" />
                        <span>Tentang</span>
                    </a>
                </li>
                <li>
                    <a href="#database">
                        <img class="svg" src="{{ asset('Shane/html/img/svg/document.svg') }}" alt="" />
                        <span>Database</span>
                    </a>
                </li>
                <li>
                    <a href="#event">
                        <img class="svg" src="{{ asset('Shane/html/img/svg/briefcase.svg') }}" alt="" />
                        <span>Event</span>
                    </a>
                </li>
                <li>
                    <a href="#administrasi">
                        <img class="svg" src="{{ asset('Shane/html/img/svg/paper.svg') }}" alt="" />
                        <span>Administrasi</span>
                    </a>
                </li>
                <li>
                    <a href="#faq">
                        <img class="svg" src="{{ asset('Shane/html/img/svg/mail.svg') }}" alt="" />
                        <span>Bantuan</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /MENU -->

        <div class="shane_tm_fixed_image" data-img-url="Shane/html/img/about/0.jpg"></div>

        <!-- /MENU -->
        <div id="home" class="shane_tm_section active">
            <div class="shane_tm_home">
                <div class="content">
                    <div class="image">
                        <div class="main" data-img-url="Shane/html/img/about/0.jpg"></div>
                    </div>
                    <img src="{{ asset('Assets/logo-pm/logo-pm-bk.png') }}" alt="" width="100px"
                        height="100px">
                    <h3 class="name">
                        My-<span class="coloring">pemudaMU</span>
                    </h3>
                    <h4 class="name">
                        <span class="coloring">Platform Organisasi Pemuda Muhammadiyah Wonosobo</span>
                    </h4>
                    <div class="shane_tm_animate_text">
                        <span class="cd-headline slide">
                            <!-- ANIMATE TEXT VALUES: zoom, rotate-1, letters type, letters rotate-2, loading-bar, slide, clip, letters rotate-3, letters scale, push,  -->
                            <span class="blc">My</span>
                            <span class="cd-words-wrapper">
                                <b class="is-visible">profil</b>
                                <b>e-KTA</b>
                                <b>event</b>
                            </span>
                        </span>
                    </div>
                    <div class="row d-flex">
                        <div class="shane_tm_button">
                            <a href="/login"><span>Login</span></a>

                            <a href="/registrasi"><span>Daftar</span></a>
                        </div>
                        <div class="shane_tm_button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /HOME -->

        <!-- ABOUT -->
        <div id="about" class="shane_tm_section">
            <div class="shane_tm_about">
                <div class="image">
                    <div class="main" data-img-url="Shane/html/img/about/1.jpg"></div>
                </div>
                <div class="shane_tm_main_title">
                    <h3>Tentang <span class="coloring">My-pemudaMu </span></h3>
                </div>
                <div class="main_infos">
                    <div class="container">
                        <div class="animate_text">
                            <span class="cd-headline zoom">
                                <!-- ANIMATE TEXT VALUES: zoom, rotate-1, letters type, letters rotate-2, loading-bar, slide, clip, letters rotate-3, letters scale, push,  -->
                                <span class="blc">My</span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">profil</b>
                                    <b>e-KTA</b>
                                    <b>event</b>
                                </span>
                            </span>
                        </div>
                        <p>My-pemudaMu adalah platform untuk organisasi Pemuda Muhammadiyah Wonosobo yang akan
                            digunakan untuk memudahkan pendataan anggota organisasi dalam rangka penerapan Big Data.

                            My-pemudaMu menyediakan berbagai fitur yang memudahkan aktivitas,
                            Manajemen Administrasi dan Kegiatan Pemuda Muhhamadiyah Wonosobo dari Ranting sampai Daerah,
                            sehingga dapat memudahkan dan mengefisiensi kinerja dari setiap pimpinan Pemuda Muhammadiyah
                            di seluruh Wonosobo.

                        </p>
                    </div>
                    {{-- <div class="right">
                        <ul>
                            <li>
                                <p><label>Birthday:</label><span>01.07.1990</span></p>
                            </li>
                            <li>
                                <p><label>Age:</label><span>30</span></p>
                            </li>
                            <li>
                                <p><label>Address:</label><span>Ave 11, New York, USA</span></p>
                            </li>
                            <li>
                                <p><label>Email:</label><span>hello@gmail.com</span></p>
                            </li>
                            <li>
                                <p><label>Phone:</label><span>+77 442 55 57</span></p>
                            </li>
                            <li>
                                <p><label>Website:</label><span>www.domain.com</span></p>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                {{-- <div class="shane_tm_services">
                    <div class="shane_tm_second_title">
                        <span>What I Do</span>
                    </div>
                    <ul>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/creativity.svg" alt="" />
                                <h3>Creative Design</h3>
                                <p>Web design is what creates the overall look and feel when you’re using a website.
                                    It’s the process of planning...</p>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/code.svg" alt="" />
                                <h3>Web Development</h3>
                                <p>Web design is what creates the overall look and feel when you’re using a website.
                                    It’s the process of planning...</p>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/telegram.svg" alt="" />
                                <h3>Brand Identity</h3>
                                <p>Web design is what creates the overall look and feel when you’re using a website.
                                    It’s the process of planning...</p>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/photoshop.svg" alt="" />
                                <h3>Adobe Photoshop</h3>
                                <p>Web design is what creates the overall look and feel when you’re using a website.
                                    It’s the process of planning...</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="shane_tm_second_title">
                    <span>Our Clients</span>
                </div>
                <div class="shane_tm_partners">
                    <ul class="owl-carousel">
                        <li class="item">
                            <img class="dark" src="img/partners/1.png" alt="" /> <!-- FOR LIGHT MODE -->
                            <img class="light" src="img/partners/light/1.png" alt="" />
                            <!-- FOR DARK MODE -->
                        </li>
                        <li class="item">
                            <img class="dark" src="img/partners/2.png" alt="" /> <!-- FOR LIGHT MODE -->
                            <img class="light" src="img/partners/light/2.png" alt="" />
                            <!-- FOR DARK MODE -->
                        </li>
                        <li class="item">
                            <img class="dark" src="img/partners/3.png" alt="" /> <!-- FOR LIGHT MODE -->
                            <img class="light" src="img/partners/light/3.png" alt="" />
                            <!-- FOR DARK MODE -->
                        </li>
                        <li class="item">
                            <img class="dark" src="img/partners/4.png" alt="" /> <!-- FOR LIGHT MODE -->
                            <img class="light" src="img/partners/light/4.png" alt="" />
                            <!-- FOR DARK MODE -->
                        </li>
                        <li class="item">
                            <img class="dark" src="img/partners/5.png" alt="" /> <!-- FOR LIGHT MODE -->
                            <img class="light" src="img/partners/light/5.png" alt="" />
                            <!-- FOR DARK MODE -->
                        </li>
                    </ul>
                </div>
                <div class="shane_tm_second_title">
                    <span>What Customers Say</span>
                </div>
                <div class="shane_tm_testimonials">
                    <ul class="owl-carousel">
                        <li class="item">
                            <div class="list_inner">
                                <img class="svg" src="img/svg/quote-1.svg" alt="" />
                                <p class="text">I can't believe I got support and my problem resolved in just minutes
                                    from posting my question. Simply amazing team and amazing theme! Thank you! I am
                                    happy with my purchase.</p>
                                <div class="details">
                                    <div class="image">
                                        <div class="main" data-img-url="img/about/2.jpg"></div>
                                    </div>
                                    <div class="name">
                                        <h3>Evan Brook</h3>
                                        <span>Photographer</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="list_inner">
                                <img class="svg" src="img/svg/quote-1.svg" alt="" />
                                <p class="text">I purchased the theme a few weeks ago. I had some issues with the
                                    theme, I asked customer support to help me with and they were helpful and kind to
                                    help me with all my problems.</p>
                                <div class="details">
                                    <div class="image">
                                        <div class="main" data-img-url="img/about/10.jpg"></div>
                                    </div>
                                    <div class="name">
                                        <h3>Moana Gomez</h3>
                                        <span>Web Designer</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="list_inner">
                                <img class="svg" src="img/svg/quote-1.svg" alt="" />
                                <p class="text">Awesome template, well written code and looks great on any platform.
                                    The customer support is very helpful and as huge asset to this template. I highly
                                    recommend all.</p>
                                <div class="details">
                                    <div class="image">
                                        <div class="main" data-img-url="img/about/1.jpg"></div>
                                    </div>
                                    <div class="name">
                                        <h3>Maria Trump</h3>
                                        <span>Blogger</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="list_inner">
                                <img class="svg" src="img/svg/quote-1.svg" alt="" />
                                <p class="text">Really the Code, Support, and design are awesome and its good support
                                    they are giving. They give an instant solution to our needs. Really awesome. I will
                                    strongly recommend to my friends.</p>
                                <div class="details">
                                    <div class="image">
                                        <div class="main" data-img-url="img/about/3.jpg"></div>
                                    </div>
                                    <div class="name">
                                        <h3>Steve Collins</h3>
                                        <span>Art. Group</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="shane_tm_second_title">
                    <span>Interests</span>
                </div>
                <div class="shane_tm_interests">
                    <ul>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/joystick.svg" alt="" />
                                <span>Playstation</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/book.svg" alt="" />
                                <span>Reading</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/plane.svg" alt="" />
                                <span>Traveling</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/code.svg" alt="" />
                                <span>Programming</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="shane_tm_second_title">
                    <span>Fun Facts</span>
                </div>
                <div class="shane_tm_facts">
                    <ul>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/paperw.svg" alt="" />
                                <h3>777+</h3>
                                <span>Projects Finished</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/emoji.svg" alt="" />
                                <h3>10K+</h3>
                                <span>Happy Clients</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/medal.svg" alt="" />
                                <h3>188+</h3>
                                <span>Awards Won</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/favorite.svg" alt="" />
                                <h3>4.9</h3>
                                <span>User Rating</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="shane_tm_second_title">
                    <span>Sertificates</span>
                </div>
                <div class="shane_tm_sertificate">
                    <ul class="owl-carousel">
                        <li class="item">
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/sertificate/600-375.jpg" alt="" />
                                    <div class="main" data-img-url="img/sertificate/1.jpg"></div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/sertificate/600-375.jpg" alt="" />
                                    <div class="main" data-img-url="img/sertificate/1.jpg"></div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/sertificate/600-375.jpg" alt="" />
                                    <div class="main" data-img-url="img/sertificate/1.jpg"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <!-- /ABOUT -->

        <!-- RESUME -->
        <div id="database" class="shane_tm_section">
            <div class="shane_tm_resume">
                <div class="shane_tm_main_title">
                    <h3>Database <span class="coloring">Anggota</span></h3>
                </div>
                <div class="experience_list">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h3 class="font-weight-semibold mb-0">{{ $jumlahCabang }}</h3>
                                                <h6 class="font-weight-light">Jumlah Cabang</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bg-white p-2 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="icon-database4"
                                                        style="font-size: 32px; color: #17a2b8;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h3 class="font-weight-semibold mb-0">{{ $jumlahRanting }}</h3>
                                                <h6 class="font-weight-light">Jumlah Ranting</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bg-white p-2 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="icon-database-menu"
                                                        style="font-size: 32px; color: #28a745;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h3 class="font-weight-semibold mb-0">{{ $jumlahAnggota }}</h3>
                                                <h6 class="font-weight-light">Anggota</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bg-white p-2 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="icon-users4"
                                                        style="font-size: 32px; color: #17a2b8;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h3 class="font-weight-semibold mb-0">{{ $verifikasiAnggota }}</h3>
                                                <h6 class="font-weight-light">Verifikasi</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bg-white p-2 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="icon-user-tie"
                                                        style="font-size: 32px; color: #28a745;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="card bg-warning text-dark">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h3 class="font-weight-semibold mb-0">{{ $validasiAnggota }}</h3>
                                                <h6 class="font-weight-light">Validasi</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bg-white p-2 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="icon-user-check"
                                                        style="font-size: 32px; color: #ffc107;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h3 class="font-weight-semibold mb-0">{{ $draftAnggota }}</h3>
                                                <h6 class="font-weight-light">Draft</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bg-white p-2 d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 60px; height: 60px;">
                                                    <i class="icon-user-minus"
                                                        style="font-size: 32px; color: #dc3545;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table datatable table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Cabang</th>
                                            <th>Nama Cabang</th>
                                            <th>Draft</th>
                                            <th>Validasi</th>
                                            <th>Verifikasi</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cabangData as $index => $data)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $data->cabang_cd }}</td>
                                                <td>{{ $data->cabang_nm }}</td>
                                                <td class="text-center">{{ $data->draft_count }}</td>
                                                <td class="text-center">{{ $data->validasi_count }}</td>
                                                <td class="text-center">{{ $data->verifikasi_count }}</td>
                                                <td class="text-center">{{ $data->total_count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-center">Total</th>
                                            <th class="text-center">{{ $totals['draft'] }}</th>
                                            <th class="text-center">{{ $totals['validasi'] }}</th>
                                            <th class="text-center">{{ $totals['terverifikasi'] }}</th>
                                            <th class="text-center">{{ $totals['total'] }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        // Script untuk inisialisasi grafik dengan Chart.js
                        document.addEventListener('DOMContentLoaded', function() {
                            // Inisialisasi Chart.js untuk Status Pernikahan
                            var ctx1 = document.getElementById('statusPernikahanChart').getContext('2d');
                            var statusPernikahanChart = new Chart(ctx1, {
                                type: 'bar',
                                data: {
                                    labels: ['Single', 'Married', 'Divorced'],
                                    datasets: [{
                                        label: 'Status Pernikahan',
                                        data: [12, 19, 3], // Ganti dengan data dari backend
                                        backgroundColor: '#26a69a'
                                    }]
                                }
                            });

                            // Inisialisasi Chart.js untuk Gol Darah
                            var ctx2 = document.getElementById('golDarahChart').getContext('2d');
                            var golDarahChart = new Chart(ctx2, {
                                type: 'pie',
                                data: {
                                    labels: ['A', 'B', 'AB', 'O'],
                                    datasets: [{
                                        label: 'Gol Darah',
                                        data: [10, 20, 15, 25], // Ganti dengan data dari backend
                                        backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56']
                                    }]
                                }
                            });

                            // Tambahkan inisialisasi chart lainnya di sini
                        });
                    </script>

                </div>
                {{-- <div class="shane_tm_button">
                    <a href="img/resume/resume.jpg" download><span>Download CV</span></a>
                </div>
                <div class="shane_tm_skills">
                    <div class="left">
                        <div class="shane_tm_second_title">
                            <span>Programming Skills</span>
                        </div>
                        <ul>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">Javascript</span>
                                        <span class="number">95%</span>
                                    </div>
                                    <div class="progress" data-value="95">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">HTML &amp; CSS</span>
                                        <span class="number">90%</span>
                                    </div>
                                    <div class="progress" data-value="90">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">PHP</span>
                                        <span class="number">80%</span>
                                    </div>
                                    <div class="progress" data-value="80">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">WordPress</span>
                                        <span class="number">85%</span>
                                    </div>
                                    <div class="progress" data-value="85">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <div class="shane_tm_second_title">
                            <span>Language Skills</span>
                        </div>
                        <ul>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">English</span>
                                        <span class="number">95%</span>
                                    </div>
                                    <div class="progress" data-value="95">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">Spanish</span>
                                        <span class="number">90%</span>
                                    </div>
                                    <div class="progress" data-value="90">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">Italian</span>
                                        <span class="number">80%</span>
                                    </div>
                                    <div class="progress" data-value="80">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list_inner">
                                    <div class="details">
                                        <span class="name">Japanese</span>
                                        <span class="number">85%</span>
                                    </div>
                                    <div class="progress" data-value="85">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- /RESUME -->

        <!-- WORKS -->
        <div id="event" class="shane_tm_section">
            <div class="shane_tm_works">
                <div class="shane_tm_main_title">
                    <h3>Kegiatan <span class="coloring">Organisasi</span></h3>
                </div>
                {{-- <div class="portfolio_filter">
                    <ul>
                        <li><a href="#" class="current" data-filter="*">All</a></li>
                        <li><a href="#" data-filter=".vimeo">Vimeo Video</a></li>
                        <li><a href="#" data-filter=".youtubevideo">YouTube Video</a></li>
                        <li><a href="#" data-filter=".popupimage">Popup Image</a></li>
                    </ul>
                </div>
                <div class="portfolio_list">
                    <ul class="gallery_zoom">
                        <li class="vimeo">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="video-wrapper">
                                        <video loop muted autoplay>
                                            <source
                                                src="https://player.vimeo.com/external/390322013.sd.mp4?s=15c5b725ee36b37364ff25c1a709ad4855bc3213&profile_id=165&oauth2_token_id=57447761"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Solonick Dance</h3>
                                        <span>Vimeo</span>
                                    </div>
                                </div>
                                <a class="full_link" href="portfolio-single.html"></a>
                            </div>
                        </li>
                        <li class="youtubevideo">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/2.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Technology</h3>
                                        <span>YouTube</span>
                                    </div>
                                </div>
                                <a class="full_link popup-youtube"
                                    href="https://www.youtube.com/watch?v=iIrSCm_0Sj4"></a>
                            </div>
                        </li>
                        <li class="popupimage">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/3.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>New Glass</h3>
                                        <span>Fashion</span>
                                    </div>
                                </div>
                                <a class="full_link zoom" href="img/portfolio/3.jpg"></a>
                            </div>
                        </li>
                        <li class="popupimage">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/4.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Yellow Bag</h3>
                                        <span>Branding</span>
                                    </div>
                                </div>
                                <a class="full_link zoom" href="img/portfolio/4.jpg"></a>
                            </div>
                        </li>
                        <li class="youtubevideo">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/8.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Revolution</h3>
                                        <span>YouTube</span>
                                    </div>
                                </div>
                                <a class="full_link popup-youtube"
                                    href="https://www.youtube.com/watch?v=iIrSCm_0Sj4"></a>
                            </div>
                        </li>
                        <li class="popupimage">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/6.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Happy Men</h3>
                                        <span>Branding</span>
                                    </div>
                                </div>
                                <a class="full_link zoom" href="img/portfolio/6.jpg"></a>
                            </div>
                        </li>
                        <li class="popupimage">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/7.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Seaside</h3>
                                        <span>Nature</span>
                                    </div>
                                </div>
                                <a class="full_link zoom" href="img/portfolio/7.jpg"></a>
                            </div>
                        </li>
                        <li class="vimeo">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="video-wrapper">
                                        <video loop muted autoplay>
                                            <source
                                                src="https://player.vimeo.com/external/390319820.sd.mp4?s=db3498515d124d308840893802ee139df82aba3a&amp;profile_id=165&amp;oauth2_token_id=57447761"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Mondo Alendo</h3>
                                        <span>Vimeo</span>
                                    </div>
                                </div>
                                <a class="full_link" href="portfolio-single.html"></a>
                            </div>
                        </li>
                        <li class="popupimage">
                            <div class="list_inner">
                                <div class="image_wrap">
                                    <img src="img/portfolio/3-4.jpg" alt="" />
                                    <div class="main" data-img-url="img/portfolio/5.jpg"></div>
                                </div>
                                <div class="desc">
                                    <div class="in">
                                        <h3>Emotion</h3>
                                        <span>Branding</span>
                                    </div>
                                </div>
                                <a class="full_link zoom" href="img/portfolio/5.jpg"></a>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <!-- /WORKS -->

        <!-- NEWS -->
        <div id="administrasi" class="shane_tm_section">
            <div class="shane_tm_news">
                <div class="shane_tm_main_title">
                    <h3>Administrasi <span class="coloring">Organisasi</span></h3>
                </div>
                {{-- <div class="news_inner">
                    <ul>
                        <li>
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/news/1000x700.jpg" alt="" />
                                    <div class="main" data-img-url="img/news/1.jpg"></div>
                                    <span class="category">Branding</span>
                                    <a class="full_link" href="blog-single.html"></a>
                                </div>
                                <div class="details">
                                    <span class="date">July 25, 2020</span>
                                    <h3 class="title"><a href="blog-single.html">Absolut Rebrand as Part of Their
                                            Global Strategy</a></h3>
                                    <div class="shane_tm_read_more">
                                        <a href="blog-single.html">Read More<span class="arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/news/1000x700.jpg" alt="" />
                                    <div class="main" data-img-url="img/news/2.jpg"></div>
                                    <span class="category">Marketing</span>
                                    <a class="full_link" href="blog-single.html"></a>
                                </div>
                                <div class="details">
                                    <span class="date">July 13, 2020</span>
                                    <h3 class="title"><a href="blog-single.html">The Difference Between Logo Design
                                            and Branding</a></h3>
                                    <div class="shane_tm_read_more">
                                        <a href="blog-single.html">Read More<span class="arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/news/1000x700.jpg" alt="" />
                                    <div class="main" data-img-url="img/news/3.jpg"></div>
                                    <span class="category">Development</span>
                                    <a class="full_link" href="blog-single.html"></a>
                                </div>
                                <div class="details">
                                    <span class="date">June 07, 2020</span>
                                    <h3 class="title"><a href="blog-single.html">Interview with Charlotte Holroyd on
                                            Ethical Branding</a></h3>
                                    <div class="shane_tm_read_more" data-color="">
                                        <a href="blog-single.html">Read More<span class="arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/news/1000x700.jpg" alt="" />
                                    <div class="main" data-img-url="img/news/1.jpg"></div>
                                    <span class="category">Branding</span>
                                    <a class="full_link" href="blog-single.html"></a>
                                </div>
                                <div class="details">
                                    <span class="date">July 25, 2020</span>
                                    <h3 class="title"><a href="blog-single.html">Absolut Rebrand as Part of Their
                                            Global Strategy</a></h3>
                                    <div class="shane_tm_read_more">
                                        <a href="blog-single.html">Read More<span class="arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/news/1000x700.jpg" alt="" />
                                    <div class="main" data-img-url="img/news/2.jpg"></div>
                                    <span class="category">Marketing</span>
                                    <a class="full_link" href="blog-single.html"></a>
                                </div>
                                <div class="details">
                                    <span class="date">July 13, 2020</span>
                                    <h3 class="title"><a href="blog-single.html">The Difference Between Logo Design
                                            and Branding</a></h3>
                                    <div class="shane_tm_read_more">
                                        <a href="blog-single.html">Read More<span class="arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <div class="image">
                                    <img src="img/news/1000x700.jpg" alt="" />
                                    <div class="main" data-img-url="img/news/3.jpg"></div>
                                    <span class="category">Development</span>
                                    <a class="full_link" href="blog-single.html"></a>
                                </div>
                                <div class="details">
                                    <span class="date">June 07, 2020</span>
                                    <h3 class="title"><a href="blog-single.html">Interview with Charlotte Holroyd on
                                            Ethical Branding</a></h3>
                                    <div class="shane_tm_read_more" data-color="">
                                        <a href="blog-single.html">Read More<span class="arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <!-- /NEWS -->

        <!-- CONTACT -->
        <div id="faq" class="shane_tm_section">
            <div class="shane_tm_contact">
                <div class="shane_tm_main_title">
                    <h3>Bantuan <span class="coloring">FAQ ?</span></h3>
                </div>
                {{-- <div class="short_info">
                    <ul>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/pin.svg" alt="" />
                                <span>Ave 11, New York, USA</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/call.svg" alt="" />
                                <span>+77 442 55 57</span>
                            </div>
                        </li>
                        <li>
                            <div class="list_inner">
                                <img class="svg" src="img/svg/email.svg" alt="" />
                                <span>hello@gmail.com</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="contact_inner">
                    <div class="wrapper">
                        <div class="left">
                            <div class="fields">
                                <form action="/" method="post" class="contact_form" id="contact_form"
                                    autocomplete="off">
                                    <div class="returnmessage"
                                        data-success="Your message has been received, We will contact you soon."></div>
                                    <div class="empty_notice"><span>Please Fill Required Fields</span></div>
                                    <div class="first">
                                        <ul>
                                            <li>
                                                <input id="name" type="text" placeholder="Name">
                                            </li>
                                            <li>
                                                <input id="email" type="text" placeholder="Email">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="last">
                                        <textarea id="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="shane_tm_button">
                                        <a id="send_message" href="#"><span>Send Message</span></a>
                                    </div>

                                    <!-- PS: If you want to change mail address to yours, please open modal.php and go to line 4 -->

                                </form>
                            </div>
                        </div>
                        <div class="right">
                            <div class="map_wrap">
                                <div class="map" id="ieatmaps"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- /CONTACT -->

        <!-- CURSOR -->
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>
        <!-- /CURSOR -->

    </div>
    <!-- / WRAPPER ALL -->

    <!-- SCRIPTS -->


    <script src="{{ asset('Shane\html\js\jquery.js') }}"></script>
    <script type="{{ asset('Shane\html\js\ie8.js') }}"></script>
    <script src="{{ asset('Shane\html\js\plugins.js') }}"></script>
    {{-- <script src="{{ asset('Shane\html\js\elements.js') }}"></script> --}}
    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5bpEs3xlB8vhxNFErwoo3MXR64uavf6Y&callback=initMap"></script> --}}
    {{-- <script src="js/init.js"></script> --}}
    <script src="{{ asset('Shane\html\js\init.js') }}"></script>
    <!-- /SCRIPTS -->

</body>

</html>