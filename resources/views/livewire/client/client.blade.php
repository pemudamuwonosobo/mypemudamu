<div>
    <div class="col-md-12">
        <div class="profile-cover">
            <div class="profile-cover-img" style="background-image: url('{{ asset('Assets/banner/banner1.jpg') }}');">
            </div>
            <div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
                <div class="card-img-actions d-inline-block mb-3">
                    <img src="{{ asset('storage/' . $dataclient->foto) }}" class="border-white rounded-circle"
                        width="170" height="170" alt="">
                    <div class="card-img-actions-overlay card-img rounded-circle">
                        <button type="button"
                            class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round"
                            data-toggle="modal" data-target="#FormModal" wire:click="editFoto({{ $dataclient->id }})">
                            <i class="icon-camera"></i><br>Ubah
                        </button>
                    </div>
                </div>

                <!-- Modal Form Import Excel-->
                <div wire:ignore.self class="modal fade" id="FormModal" tabindex="-1" role="dialog"
                    aria-labelledby="FormModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="FormModalLabel">Ubah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="fotoProfil" class="form-label">Pilih Foto Profil</label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                            id="fotoProfil" wire:model.live="foto" name="fotoProfil" accept="image/*"
                                            onchange="previewFotoProfil(event)">
                                        @error('foto')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Pratinjau Foto -->
                                    <div class="mb-3">
                                        <img id="pratinjauFoto" src="#" alt="Pratinjau Foto Profil"
                                            style="display:none; width: 150px; height: 150px; object-fit: cover;"
                                            class="rounded-circle">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary"
                                    wire:click="updateFoto()">updatedFoto</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="media-body text-white ml-3">
                    <h1 class="mb-0"> {{ $dataclient->gelar_depan }}
                        @if (!empty($dataclient->gelar_depan))
                            .&nbsp;
                        @endif
                        {{ $dataclient->nama }}
                        @if (!empty($dataclient->gelar_belakang))
                            ,&nbsp;
                        @endif
                        {{ $dataclient->gelar_belakang }}
                    </h1>
                    <span class="d-block">PCPM {{ $dataclient->Cabang->cabang_nm }}</span>

                    @if ($dataclient->status == 'Draft')
                        {{ $dataclient->no_anggota }} <span class="badge badge-danger"
                            style="text-transform: capitalize;">{{ $dataclient->status }}</span>
                    @elseif ($dataclient->status == 'Validasi')
                        {{ $dataclient->no_anggota }} <span class="badge badge-primary"
                            style="text-transform: capitalize;">{{ $dataclient->status }}</span>
                    @else
                        {{ $dataclient->no_anggota }} <span class="badge badge-success"
                            style="text-transform: capitalize;">{{ $dataclient->status }}</span>
                    @endif
                </div>

                <div class="ml-md-3 mt-2 mt-md-0">
                    <ul class="list-inline list-inline-condensed mb-0">
                        <li class="list-inline-item"><a href="/logout" class="btn btn-light border-transparent"><i
                                    class="icon-switch2"></i> Logout</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- /cover area -->

    </div>

    <div class="col-md-12">
        <!-- Profile navigation -->
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                    data-target="#navbar-second">
                    <i class="icon-menu7 mr-2"></i>
                    Profile navigation
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-second">
                <div class="row">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="#profil" wire:click="refrash" class="navbar-nav-link active" data-toggle="tab">
                                <i class="icon-profile mr-2"></i>
                                Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#riwayat_pendidikan" class="navbar-nav-link" data-toggle="tab">
                                <i class="icon-graduation mr-2"></i>
                                Riwayat Pendidikan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#riwayat_organisasi" class="navbar-nav-link" data-toggle="tab">
                                <i class="icon-stats-growth mr-2"></i>
                                Riwayat Organisasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#riwayat_perkaderan" class="navbar-nav-link" data-toggle="tab">
                                <i class="icon-stairs mr-2"></i>
                                Riwayat Perkaderan
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
        <!-- /profile navigation -->


        <!-- Content area -->
        <div class="content">

            <!-- Inner container -->
            <div class="d-flex align-items-start flex-column flex-md-row">

                <!-- Left content -->
                <div class="tab-content w-100 order-2 order-md-1">
                    <div class="tab-pane fade active show" id="profil">
                        <div class="card">
                            @if ($updatedata)
                                <div class="card-header">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight">
                                            <h6 class="card-title">Form Edit Profil</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label">Cabang <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="col-lg-8">
                                                                        <select x-init="$($el).select2({ placeholder: 'Pilih Cabang' });
                                                                        $($el).on('change', function() {
                                                                            $wire.set('cabang', $($el).val());
                                                                        });
                                                                        $($el).val($($el).val()).trigger('change');"
                                                                            wire:model.live="cabang"
                                                                            wire:change='updateListType'
                                                                            class="form-control form-control-select2">
                                                                            <option value="">Pilih</option>
                                                                            @foreach ($cabangs as $list)
                                                                                <option
                                                                                    value="{{ $list->cabang_cd }}">
                                                                                    {{ $list->cabang_nm }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('cabang')
                                                                            <span
                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label">Ranting
                                                                        <span class="text-danger">*</span></label>
                                                                    <div class="col-lg-8">
                                                                        <select x-init="$($el).select2({ placeholder: 'Pilih Cabang' });
                                                                        $($el).on('change', function() {
                                                                            $wire.set('ranting', $($el).val());
                                                                        });
                                                                        $($el).val('{{ $ranting }}').trigger('change');"
                                                                            wire:model.live="ranting"
                                                                            class="form-control form-control-select2">
                                                                            <option value="">Pilih</option>
                                                                            @foreach ($listType as $list)
                                                                                <option value="{{ $list->cabang_cd }}"
                                                                                    {{ $ranting == $list->cabang_cd ? 'selected' : '' }}>
                                                                                    {{ $list->cabang_nm }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>

                                                                        @error('ranting')
                                                                            <span
                                                                                class="form-text text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Gelar</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control"
                                                                wire:model="gelar_depan" placeholder="Gelar Depan">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control"
                                                                wire:model="gelar_belakang"
                                                                placeholder="Gelar Belakang">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Nama <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control"
                                                                wire:model="nama" placeholder="Masukkan nama lengkap">
                                                            @error('nama')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Tempat/Tanggal Lahir
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control"
                                                                wire:model="tempat_lahir"
                                                                placeholder="Masukkan Tempat Lahir">
                                                            @error('tempat_lahir')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="icon-calendar3"></i></span>
                                                                </span>
                                                                <input type="date" class="form-control"
                                                                    wire:model.live="tgl_lahir"
                                                                    placeholder="28/12/1995">
                                                            </div>
                                                            @error('tgl_lahir')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">NIK <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control"
                                                                wire:model="nik" placeholder="Masukkan NIK">
                                                            @error('nik')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @if ($updatedata == false)
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <input type="email" class="form-control"
                                                                    wire:model="email" placeholder="Masukkan email">
                                                                @error('email')
                                                                    <span
                                                                        class="form-text text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label">No. HP/Telp <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control"
                                                                    wire:model="no_telp"
                                                                    placeholder="Masukkan nomor hp/telp">
                                                                @error('no_telp')
                                                                    <span
                                                                        class="form-text text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <input type="email" class="form-control"
                                                                    wire:model="email" placeholder="Masukkan email"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label">No. HP/Telp <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control"
                                                                    wire:model="no_telp"
                                                                    placeholder="Masukkan nomor hp/telp" readonly>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Alamat <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                            <textarea rows="2" cols="3" wire:model="alamat"
                                                                placeholder="Masukkan alamat contoh: Ngadisari 02/07 Kejajar, Kejajar, Wonosobo" class="form-control"></textarea>
                                                            @error('alamat')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-3 col-form-label">Pendidikan Terakhir
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-lg-3">
                                                            <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                                            $($el).on('change', function() {
                                                                $wire.set('pendidikan_terakhir', $($el).val());
                                                            });
                                                            $($el).val($($el).val()).trigger('change');"
                                                                wire:model.live="pendidikan_terakhir"
                                                                wire:change='updateListType'
                                                                class="form-control form-control-select2">
                                                                <option value="">Pilih</option>
                                                                <option value="SD">SD</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SMA">SMA</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            </select>
                                                        </div>
                                                        @error('pendidikan_terakhir')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group row mb-1">
                                                        <label class="col-lg-3 col-form-label">Golongan Darah <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-3">
                                                            <select x-init="$($el).select2({ placeholder: 'Pilih Cabang' });
                                                            $($el).on('change', function() {
                                                                $wire.set('gol_darah', $($el).val());
                                                            });
                                                            $($el).val($($el).val()).trigger('change');"
                                                                wire:model.live="gol_darah"
                                                                wire:change='updateListType'
                                                                class="form-control form-control-select2">
                                                                <option value="">Pilih</option>
                                                                @foreach ($gol_darahs as $list)
                                                                    <option value="{{ $list->id }}">
                                                                        {{ $list->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('gol_darah')
                                                            <span class="form-text text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-1">
                                                        <label class="col-form-label">Apakah Memiliki NBM? <span
                                                                class="text-danger">*</span></label>
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="is_nbm"
                                                                            value="sudah" id="sudah"
                                                                            class="form-input-styled"
                                                                            wire:model.live="is_nbm">
                                                                        Sudah
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="is_nbm"
                                                                            value="belum" id="belum"
                                                                            class="form-input-styled"
                                                                            wire:model.live="is_nbm">
                                                                        Belum
                                                                    </label>
                                                                </div>
                                                                @error('is_nbm')
                                                                    <span
                                                                        class="form-text text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            @if ($is_nbm == 'sudah')
                                                                <div class="col-lg-7" data-animation="bounceInLeft">
                                                                    <input type="text" class="form-control"
                                                                        wire:model="no_nbm"
                                                                        placeholder="Masukkan Nomor NBM/KTAM">
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="form-group mb-1">
                                                        <label class="col-form-label">Pernah Mengikuti Baitul Arqom?
                                                            <span class="text-danger">*</span></label>
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="is_ba"
                                                                            value="sudah" class="form-input-styled"
                                                                            wire:model.live="is_ba">
                                                                        Sudah
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="is_ba"
                                                                            value="belum" class="form-input-styled"
                                                                            wire:model.live="is_ba">
                                                                        Belum
                                                                    </label>
                                                                </div>
                                                                @error('is_ba')
                                                                    <span
                                                                        class="form-text text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            @if ($is_ba == 'sudah')
                                                                <div class="col-lg-4">
                                                                    <select x-init="$($el).select2({ placeholder: 'Pilih Cabang' });
                                                                    $($el).on('change', function() {
                                                                        $wire.set('tahun_ba', $($el).val());
                                                                    });
                                                                    $($el).val($($el).val()).trigger('change');"name="tahun"
                                                                        id="tahun" wire:model.live="tahun_ba"
                                                                        class="form-control form-control-select2">
                                                                        <option selected="selected">Masukan Tahun BA
                                                                        </option>
                                                                        @foreach ($years as $year)
                                                                            <option value="{{ $year }}">
                                                                                {{ $year }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Status Pernikahan <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="status_kawin"
                                                                            value="menikah" class="form-input-styled"
                                                                            wire:model.live="status_kawin" checked
                                                                            data-fouc>
                                                                        Menikah
                                                                    </label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="status_kawin"
                                                                            value="belum menikah"
                                                                            class="form-input-styled"
                                                                            wire:model.live="status_kawin" data-fouc>
                                                                        Belum Menikah
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="status_kawin"
                                                                            value="duda" class="form-input-styled"
                                                                            wire:model.live="status_kawin" data-fouc>
                                                                        Duda
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @error('status_kawin')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Profesi <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-4">
                                                            <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                                            $($el).on('change', function() {
                                                                $wire.set('profesi', $($el).val());
                                                            });
                                                            $($el).val($($el).val()).trigger('change');" wire:model.live="profesi"
                                                                wire:change='updateListType'
                                                                class="form-control form-control-select2">
                                                                <option value="">Pilih</option>
                                                                @foreach ($profesis as $list)
                                                                    <option value="{{ $list->id }}">
                                                                        {{ $list->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('profesi')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <input type="text" class="form-control"
                                                                wire:model="profesi_lain"
                                                                placeholder="Profesi Lainnya">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Pekerjaan <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-4">
                                                            <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                                            $($el).on('change', function() {
                                                                $wire.set('pekerjaan', $($el).val());
                                                            });
                                                            $($el).val($($el).val()).trigger('change');"
                                                                wire:model.live="pekerjaan"
                                                                wire:change='updateListType'
                                                                class="form-control form-control-select2">
                                                                <option value="">Pilih</option>
                                                                @foreach ($pekerjaans as $list)
                                                                    <option value="{{ $list->id }}">
                                                                        {{ $list->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('pekerjaan')
                                                                <span
                                                                    class="form-text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <input type="text" class="form-control"
                                                                wire:model="tempat_kerja"
                                                                placeholder="Instansi/Tempat Kerja">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Upload Foto <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-6" wire:ignore>
                                                            <input type="file" wire:model="foto"
                                                                class="file-input" data-show-caption="true"
                                                                data-show-upload="true" accept="image/*"
                                                                id="fotoInput" data-fouc>
                                                        </div>
                                                    </div>

                                                    @error('foto')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror --}}

                                                </div>
                                            </div>
                                            <div class="text-right">
                                                @if ($updatedata == false)
                                                    <button type="button"
                                                        class="btn bg-primary-300 btn-labeled btn-labeled-left"
                                                        wire:click="store()"><b><i
                                                                class="icon-paperplane"></i></b>Simpan</button>
                                                @else
                                                    <button type="button"
                                                        class="btn bg-grey-300 btn-labeled btn-labeled-left"
                                                        wire:click="back_store()"><b><i
                                                                class="icon-rotate-ccw3"></i></b>Kembali</button>
                                                    <button type="button"
                                                        class="btn bg-warning-600 btn-labeled btn-labeled-left"
                                                        wire:click="updateForm()"><b><i
                                                                class="icon-paperplane"></i></b>Update</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- Sales stats -->
                        <div class="card">
                            {{-- dataview --}}
                            <div class="card-header">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 w-100 bd-highlight">
                                        <h6 class="card-title">Profil Saya</h6>
                                    </div>


                                    <div class="p-2 bd-highlight ml-auto d-flex align-items-center">
                                        <p><button type="button"
                                                class="btn btn-warning btn-labeled btn-labeled-left btn-sm"
                                                wire:click="edit({{ $dataclient->id }})"><b><i
                                                        class="icon-pencil"></i></b> Edit Profil</button></p>

                                    </div>
                                    @if ($dataclient->status == 'Terverifikasi')
                                        <div class="p-2 bd-highlight  ml-auto d-flex align-items-center">
                                            <p><button href="#" type="button"
                                                    class="btn btn-primary btn-labeled btn-labeled-left btn-sm idcarddownloadButton"
                                                    data-id="{{ \Illuminate\Support\Facades\Crypt::encryptString($dataclient->id) }}"><b><i
                                                            class="icon-vcard"></i></b>
                                                    e-KTA</button></p>

                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="container ml-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Nama
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->gelar_depan }}
                                                @if (!empty($dataclient->gelar_depan))
                                                    .&nbsp;
                                                @endif
                                                {{ $dataclient->nama }}
                                                @if (!empty($dataclient->gelar_belakang))
                                                    ,&nbsp;
                                                @endif
                                                {{ $dataclient->gelar_belakang }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Cabang
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->Cabang->cabang_nm }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Ranting
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->Ranting->cabang_nm }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                NIK
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->nik }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                TTL
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->tempat_lahir }},
                                                {{ \Carbon\Carbon::parse($dataclient->tgl_lahir)->isoFormat('DD MMMM YYYY') }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                E-mail
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->email }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                No. HP
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->no_telp }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Alamat
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->alamat }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Pendidikan Terakhir
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->pendidikan_terakhir }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Golongan Darah
                                            </div>
                                            <div class="col-md-8">
                                                : {{ $dataclient->GolDarah->nama }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                @if ($dataclient->is_nbm == 'sudah')
                                                    <span class="badge badge-success capitalize"
                                                        style="text-transform: capitalize;">{{ $dataclient->is_nbm }}</span>
                                                    Memiliki NBM
                                                @else
                                                    <span class="badge badge-danger capitalize"
                                                        style="text-transform: capitalize;">{{ $dataclient->is_nbm }}</span>
                                                    Memiliki NBM
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            @if ($dataclient->is_nbm == 'sudah')
                                                <div class="col-md-4">
                                                    No. NBM
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->no_nbm }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-8">
                                                @if ($dataclient->is_ba == 'sudah')
                                                    <span class="badge badge-success capitalize"
                                                        style="text-transform: capitalize;">{{ $dataclient->is_ba }}</span>
                                                    Mengikuti Baitul Arqom
                                                @else
                                                    <span class="badge badge-danger capitalize"
                                                        style="text-transform: capitalize;">{{ $dataclient->is_ba }}</span>
                                                    Mengikuti Baitul Arqom
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            @if ($dataclient->is_ba == 'sudah')
                                                <div class="col-md-4">
                                                    Tahun Baitul Arqom
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->tahun_ba }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                Status Perkawinan
                                            </div>
                                            <div class="col-md-8" style="text-transform: capitalize;">
                                                : {{ $dataclient->status_kawin }}
                                            </div>
                                        </div>
                                        @if ($dataclient->profesi !== '17')
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    Profesi
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->Profesi->nama }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    Profesi
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->profesi_lain }}
                                                </div>
                                            </div>
                                        @endif

                                        @if ($dataclient->pekerjaan !== '4')
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    Pekerjaan
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->Pekerjaan->nama }}
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    Tempat Kerja
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->tempat_kerja }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    Pekerjaan
                                                </div>
                                                <div class="col-md-8">
                                                    : {{ $dataclient->pekerjaan }}
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /sales stats -->

                        <!-- Invoices -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card border-left-3 border-left-danger rounded-left-0">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6 class="font-weight-semibold"><span
                                                        class="badge badge-danger">Riwayat Pendidikan</span></h6>
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($riwayat_pendidikan as $value)
                                                            <tr>
                                                                <td>- {{ $value->tingkat }} {{ $value->nama_sekolah }}
                                                                    <b>( {{ $value->tahun_masuk }} -
                                                                        {{ $value->tahun_lulus }}) </b>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card border-left-3 border-left-success rounded-left-0">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6 class="font-weight-semibold"><span
                                                        class="badge badge-success">Riwayat Orgaisasi</span></h6>
                                                <table class="table">
                                                    <span>Organisasi Internal</span>
                                                    <tbody>
                                                        @foreach ($riwayat_organisasi_internal as $value)
                                                            <tr>
                                                                <td>- {{ $value->tingkat }}
                                                                    {{ $value->nama_organisasi }}
                                                                    <b>( {{ $value->periode_awal }} -
                                                                        {{ $value->periode_akhir }}) </b>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <table class="table">
                                                    <span>Organisasi Eksternal</span>
                                                    <tbody>
                                                        @foreach ($riwayat_organisasi_eksternal as $value)
                                                            <tr>
                                                                <td>- {{ $value->tingkat }}
                                                                    {{ $value->nama_organisasi }}
                                                                    <b>( {{ $value->periode_awal }} -
                                                                        {{ $value->periode_akhir }}) </b>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border-left-3 border-left-primary rounded-left-0">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6 class="font-weight-semibold"><span
                                                        class="badge badge-primary">Riwayat Perkaderan</span></h6>
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($riwayat_perkaderan as $value)
                                                            <tr>
                                                                <td>- {{ $value->nama_perkaderan }}
                                                                    {{ $value->npenyelenggara }}
                                                                    <b>( {{ $value->tahun }} )</b>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="riwayat_pendidikan">
                        <div class="card">
                            <livewire:client.pendidikan-client />

                        </div>
                    </div>
                    <div class="tab-pane fade" id="riwayat_organisasi">

                        <div class="card">
                            <livewire:client.organisasi-client />
                        </div>


                    </div>

                    <div class="tab-pane fade" id="riwayat_perkaderan">

                        <div class="card">
                            <livewire:client.perkaderan-client />
                        </div>

                    </div>
                </div>
                <!-- /left content -->




            </div>
            <!-- /inner container -->

        </div>
    </div>

</div>

@push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('initializeFileInput', event => {
                let value = event.detail.value;
                $('.file-input').val(value).trigger('change');
            });
        });
    </script>
    <script>
        $(document).on('click', '.idcarddownloadButton', function() {
            var id = $(this).attr("data-id"); // Ambil nilai ID dari atribut data-id
            var url = "{{ url('id-card') }}?data=" + id; // Ganti placeholder :id dengan nilai id
            var redirectWindow = window.open(url, '_blank');
            redirectWindow.open();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = document.getElementById('FormModal');
            var fotoInput = document.getElementById('fotoInput'); // ID input foto

            myModal.addEventListener('shown.bs.modal', function() {
                if (fotoInput) {
                    fotoInput.focus(); // Fokus pada input foto saat modal terbuka
                }
            });
        });
    </script>

    <script>
        // Fungsi untuk menampilkan pratinjau foto
        function previewFotoProfil(event) {
            var output = document.getElementById('pratinjauFoto');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = 'block';
        }

        // Fungsi untuk submit form (kustomisasi sesuai kebutuhan)
        function submitFotoProfil() {
            var form = document.getElementById('formUbahFoto');
            // Proses unggah atau kirim form menggunakan Ajax atau metode lain
            console.log('Form siap di-submit');
        }
    </script>
@endpush
