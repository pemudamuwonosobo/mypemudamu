<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi My-PemudaMu</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\global_assets\css\icons\icomoon\styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\bootstrap_limitless.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\layout.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\components.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\layout_1\LTR\default\full\assets\css\colors.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\global_assets\css\icons\fontawesome\styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless\global_assets\css\extras\animate.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navbar styles */
        .navbar {
            position: sticky;
            top: 0;
            width: 100%;
            background-color: white;
            color: #db0e0e;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar-container {
            display: flex;
            justify-content: start;
            align-items: center;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            gap: 20px;
            font-family: "Red Hat Text", sans-serif;
        }

        .nav-links a {
            margin-left: 5px;
            line-height: 8px;
            font-weight: 500;
            font-size: 24px;
            margin: 5px 0;
            white-space: nowrap;
            letter-spacing: 1px;
        }

        .nav-links b {
            margin-left: 5px;
            line-height: 8px;
            font-weight: 100;
            font-size: 20px;
            margin: 5px 0;
            white-space: nowrap;
            line-height: 2px;
            letter-spacing: 1px;
            margin-bottom: -5px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .utama {
            width: 100vw;
            height: 100vh;
            background-image: url('../Assets/logo-pm/logo-pm-t.jpg');
            background-repeat: repeat-y repeat-x;
            background-size: 100px;
        }

        .footer {
            background-color: #ffffff;
            color: #000000;
            margin-top: auto;
            font-family: "Red Hat Text", sans-serif;
            padding-top: 5px;
        }

        .footer-container {
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .footer-links a {
            color: #000000;
            text-decoration: none;
            font-size: 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .navbar-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 20px;
                font-family: "Red Hat Text", sans-serif;

            }

            .nav-links a {
                font-size: 14px;
            }

            .nav-links b {
                font-size: 12px;
            }

            .footer-links {
                flex-direction: column;
                gap: 10px;
            }

            .footer-links a {
                font-size: 10px;
            }
        }

        @media (max-width: 480px) {
            .navbar-container {
                padding: 0 10px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .nav-links b {
                font-size: 10px;
            }

            .footer-links a {
                font-size: 8px;
            }
        }
    </style>


</head>

<body class="utama">
    <nav class="navbar">
        <div class="navbar-container" style="display: flex; align-items: center;">
            <a href="#" class="logo" style="margin-right: 10px;">
                <img src="{{ asset('/Assets/logo-pm/pngwing.com.png') }}" width="70px" height="65px">
            </a>
            <div class="nav-links">
                <b>FORMULIR REGISTRASI KARTU TANDA ANGGOTA ELEKTRONIK (E-KTA)</b>
                <a>PEMUDA MUHAMMADIYAH WONOSOBO</a>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="registration-container mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cabang <span class="text-danger">*</span></label>
                                    <select name="cabang" class="form-control form-control-select2" id="cabang">
                                        <option value="">Pilih</option>
                                        @foreach ($cabangs as $list)
                                            @if (old('cabang') == $list->cabang_cd)
                                                <option value="{{ $list->cabang_cd }}" selected>{{ $list->cabang_nm }}
                                                </option>
                                            @else
                                                <option value="{{ $list->cabang_cd }}">{{ $list->cabang_nm }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('cabang')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ranting <span class="text-danger">*</span></label>
                                    <select name="ranting" class="form-control form-control-select2" id="ranting">
                                        <option value="">Pilih</option>
                                    </select>
                                    @error('ranting')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-1">
                            <label>Gelar</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="gelar_depan"
                                        placeholder="Gelar Depan" value="{{ old('gelar_depan') }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="gelar_belakang"
                                        placeholder="Gelar Belakang" value="{{ old('gelar_belakang') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama"
                                        placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
                                    @error('nama')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nik"
                                        placeholder="Masukkan NIK" value="{{ old('nik') }}">
                                    @error('nik')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tempat/Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tempat_lahir"
                                                placeholder="Masukkan Tempat Lahir"
                                                value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="icon-calendar3"></i></span>
                                                </span>
                                                <input type="date" class="form-control" name="tgl_lahir"
                                                    placeholder="28/12/1995" value="{{ old('tgl_lahir') }}">
                                            </div>
                                            @error('tgl_lahir')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Golongan Darah <span class="text-danger">*</span></label>
                                    <select name="gol_darah" wire:change='updateListType'
                                        class="form-control form-control-select2">
                                        <option value="">Pilih</option>
                                        @foreach ($golongandarahs as $list)
                                            @if (old('gol_darah') == $list->id)
                                                <option value="{{ $list->id }}" selected>{{ $list->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $list->id }}">{{ $list->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('gol_darah')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <select name="pendidikan_terakhir" wire:change='updateListType'
                                                class="form-control form-control-select2">
                                                <option value="">Pilih</option>
                                                @if (old('pendidikan_terakhir') == 'SD')
                                                    <option value="SD" selected>SD</option>
                                                @else
                                                    <option value="SD">SD</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'SMP')
                                                    <option value="SMP" selected>SMP</option>
                                                @else
                                                    <option value="SMP">SMP</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'SMA')
                                                    <option value="SMA" selected>SMA</option>
                                                @else
                                                    <option value="SMA">SMA</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'Diploma 1')
                                                    <option value="Diploma 1" selected>Diploma 1</option>
                                                @else
                                                    <option value="Diploma 1">Diploma 1</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'Diploma 2')
                                                    <option value="Diploma 2" selected>Diploma 2</option>
                                                @else
                                                    <option value="Diploma 2">Diploma 2</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'Diploma 3')
                                                    <option value="Diploma 3" selected>Diploma 3</option>
                                                @else
                                                    <option value="Diploma 3">Diploma 3</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'Diploma 4')
                                                    <option value="Diploma 4" selected>Diploma 4</option>
                                                @else
                                                    <option value="Diploma 4">Diploma 4</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'S1')
                                                    <option value="S1" selected>S1</option>
                                                @else
                                                    <option value="S1">S1</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'S2')
                                                    <option value="S2" selected>S2</option>
                                                @else
                                                    <option value="S2">S2</option>
                                                @endif
                                                @if (old('pendidikan_terakhir') == 'S3')
                                                    <option value="S3" selected>S3</option>
                                                @else
                                                    <option value="S3">S3</option>
                                                @endif
                                            </select>
                                            @error('pendidikan_terakhir')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>No. HP/Telp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_telp"
                                    placeholder="Masukkan nomor hp/telp" value="{{ old('no_telp') }}">
                                @error('no_telp')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Alamat <span class="text-danger">*</span></label>
                                    <textarea rows="2" cols="3" name="alamat"
                                        placeholder="Masukkan alamat contoh: Ngadisari 02/07 Kejajar, Kejajar, Wonosobo" class="form-control"
                                        value="{{ old('alamat') }}"></textarea>
                                    @error('alamat')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Apakah Memiliki NBM? <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="is_nbm" value="sudah"
                                                        id="sudah" class="form-input-styled"
                                                        @if (old('is_nbm') == 'sudah') checked @endif>
                                                    Sudah
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="is_nbm" value="belum"
                                                        id="belum" class="form-input-styled"
                                                        @if (old('is_nbm') == 'belum') checked @endif>
                                                    Belum
                                                </label>
                                            </div>
                                            @error('is_nbm')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 nnbm" style="display:none;"
                                            data-animation="bounceInLeft">
                                            <input type="text" class="form-control" name="no_nbm"
                                                placeholder="Masukkan Nomor NBM/KTAM" value="{{ old('no_nbm') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pernah Mengikuti Baitul Arqom? <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="is_ba" value="sudah"
                                                            class="form-input-styled" name="is_ba"
                                                            @if (old('is_ba') == 'sudah') checked @endif>
                                                        Sudah
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="is_ba" value="belum"
                                                            class="form-input-styled" name="is_ba"
                                                            @if (old('is_ba') == 'belum') checked @endif>
                                                        Belum
                                                    </label>
                                                </div>
                                                @error('is_ba')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-3 thnba" style="display:none;">
                                                <select name="tahun_ba" class="form-control form-control-select2">
                                                    <option selected="selected">Masukan Tahun BA</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year }}">{{ $year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status Pernikahan <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="status_kawin" value="menikah"
                                                class="form-input-styled" name="status_kawin"
                                                @if (old('status_kawin') == 'menikah') checked @endif data-fouc>
                                            Menikah
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="status_kawin" value="belum menikah"
                                                class="form-input-styled" name="status_kawin"
                                                @if (old('status_kawin') == 'belum menikah') checked @endif data-fouc>
                                            Belum Menikah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="status_kawin" value="duda"
                                                class="form-input-styled" name="status_kawin"
                                                @if (old('status_kawin') == 'duda') checked @endif data-fouc>
                                            Duda
                                        </label>
                                    </div>
                                </div>
                                @error('status_kawin')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label>Profesi <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <select name="profesi" wire:change='updateListType'
                                                class="form-control form-control-select2">
                                                <option value="">Pilih</option>
                                                @foreach ($profesis as $list)
                                                    @if (old('profesi') == $list->id)
                                                        <option value="{{ $list->id }}" selected>
                                                            {{ $list->nama }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->nama }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('profesi')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-7 proflain" style="display:none;">
                                            <input type="text" class="form-control" name="profesi_lain"
                                                placeholder="Profesi Lainnya" value="{{ old('profesi_lain') }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label>Pekerjaan <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <select name="pekerjaan" wire:change='updateListType'
                                                class="form-control form-control-select2">
                                                <option value="">Pilih</option>
                                                @foreach ($pekerjaans as $list)
                                                    @if (old('pekerjaan') == $list->id)
                                                        <option value="{{ $list->id }}" selected>
                                                            {{ $list->nama }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->nama }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('pekerjaan')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-7 tempatkerja" style="display:none;">
                                            <input type="text" class="form-control" name="tempat_kerja"
                                                placeholder="Instansi/Tempat Kerja"
                                                value="{{ old('tempat_kerja') }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Upload Foto <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- Check if there's an old value and display the filename -->
                                        @if (old('foto'))
                                            <p>Current file: {{ old('foto') }}</p>
                                            <input type="hidden" name="old_foto" value="{{ old('foto') }}">
                                        @endif
                                        <input type="file" name="foto" class="file-input"
                                            data-show-caption="true" data-show-upload="true" accept="image/*"
                                            data-fouc>
                                    </div>
                                    @error('foto')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-2">
                            <div class="row">
                                <div class="ml-auto d-flex">
                                    <div class="text-right ml-2">
                                        <a href="{{ route('home') }}"
                                            class="btn bg-grey-300 btn-labeled btn-labeled-left">
                                            <b><i class="icon-rotate-ccw3"></i></b>Kembali
                                        </a>
                                    </div>
                                    <div class="text-right ml-2">
                                        <button type="submit"
                                            class="btn bg-primary-300 btn-labeled btn-labeled-left">
                                            <b><i class="icon-paperplane"></i></b>Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; 2024 - Pimpinan Daerah Pemuda Muhammadiyah Wonosobo</p>
        </div>
    </footer>

    {{-- <script src="{{ asset('limitless\global_assets\js\main\jquery.min.js') }}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('limitless\global_assets\js\main\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\loaders\blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('limitless\global_assets\js\demo_pages\animations_css3.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\visualization\d3\d3.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\visualization\d3\d3_tooltip.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\forms\styling\switchery.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\forms\selects\bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\ui\moment\moment.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\daterangepicker.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\extensions\jquery_ui\interactions.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\forms\selects\select2.min.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\forms\styling\uniform.min.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\uploaders\fileinput\plugins\purify.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\uploaders\fileinput\plugins\sortable.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\uploaders\fileinput\fileinput.min.js') }}"></script>

    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\daterangepicker.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\pickers\anytime.min.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\plugins\notifications\jgrowl.min.js') }}"></script>


    <script src="{{ asset('limitless\global_assets\js\demo_pages\uploader_bootstrap.js') }}"></script>
    <script src="{{ asset('limitless\layout_1\LTR\default\full\assets\js\app.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\dashboard.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_layouts.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_inputs.js') }}"></script>
    <script src="{{ asset('limitless\global_assets\js\demo_pages\form_checkboxes_radios.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('costume-dea\costume-dea.js') }}"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#cabang').on('change', function() {
                let id_cabang = $('#cabang').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getRanting') }}",
                    data: {
                        id_cabang: id_cabang
                    },
                    cache: false,

                    success: function(res) {
                        $("#ranting").empty();
                        $("#ranting").append('<option value="">Pilih</option>');

                        // Capture the old value for ranting
                        let oldRanting = "{{ old('ranting') }}";

                        $.each(res, function(key, value) {
                            // Check if the current key matches the old value
                            let selected = (key == oldRanting) ? 'selected' : '';
                            $("#ranting").append('<option value="' + key + '" ' +
                                selected + '>' + value + '</option>');
                        });
                    },
                    error: function(data) {
                        console.log('error', data);
                    }
                });
            });

            // Trigger change event if cabang has old value
            let oldCabang = "{{ old('cabang') }}";
            if (oldCabang) {
                $('#cabang').trigger('change');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('input[name=is_nbm]').change(function() {
                let isi = $(this).val();

                if (isi == 'sudah') {
                    $('.nnbm').show('slow');
                } else {
                    $('.nnbm').hide('slow');
                }


            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('input[name=is_ba]').change(function() {
                let isi = $(this).val();

                if (isi == 'sudah') {
                    $('.thnba').show('slow');
                } else {
                    $('.thnba').hide('slow');
                }


            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select[name=profesi]').change(function() {
                let isi = $(this).val();

                if (isi == '17') {
                    $('.proflain').show('slow');
                } else {
                    $('.proflain').hide('slow');
                }


            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select[name=pekerjaan]').change(function() {
                let isi = $(this).val();

                if (isi !== '4') {
                    $('.tempatkerja').show('slow');
                } else {
                    $('.tempatkerja').hide('slow');
                }


            });
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Success',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('/') }}";
                }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                title: 'Error',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    </script>


</body>

</html>
