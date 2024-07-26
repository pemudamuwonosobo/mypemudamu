<div>

    @if ($preview)
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Preview Data Anggota</h5>
                <div class="header-elements">
                    <a wire:click="closepreview" class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
            <div class="container ml-2">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row mb-2">
                            <div class="col-md-4">Nama</div>
                            <div class="col-md-8">
                                : {{ $gelar_depan }}
                                @if (!empty($gelar_depan))
                                    .&nbsp;
                                @endif
                                {{ $nama }}
                                @if (!empty($gelar_belakang))
                                    ,&nbsp;
                                @endif
                                {{ $gelar_belakang }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">Cabang</div>
                            <div class="col-md-8">: {{ $cabang }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">Ranting</div>
                            <div class="col-md-8">: {{ $ranting }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">NIK</div>
                            @if (Auth::user()->role_id == 1)
                                <div class="col-md-8">: {{ $nik }}</div>
                            @else
                                <div class="col-md-8">: <i style="color:red; "> Data Rahasia </i>
                                </div>
                            @endif
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">TTL</div>
                            <div class="col-md-8">: {{ $tempat_lahir }},
                                {{ \Carbon\Carbon::parse($tgl_lahir)->isoFormat('DD MMMM YYYY') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">E-mail</div>
                            <div class="col-md-8">: {{ $email }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">No. HP</div>
                            <div class="col-md-8">: {{ $no_telp }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">Alamat</div>
                            <div class="col-md-8">: {{ $alamat }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">Pendidikan Terakhir</div>
                            <div class="col-md-8">: {{ $pendidikan_terakhir }}</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row mb-2">
                            <div class="col-md-4">Golongan Darah</div>
                            <div class="col-md-8">: {{ $gol_darah }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-8">
                                @if ($is_nbm == 'sudah')
                                    <span class="badge badge-success capitalize">{{ $is_nbm }}</span>
                                    Memiliki NBM
                                @else
                                    <span class="badge badge-danger capitalize">{{ $is_nbm }}</span>
                                    Tidak Memiliki NBM
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            @if ($is_nbm == 'sudah')
                                <div class="col-md-4">No. NBM</div>
                                <div class="col-md-8">: {{ $no_nbm }}</div>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-8">
                                @if ($is_ba == 'sudah')
                                    <span class="badge badge-success capitalize">{{ $is_ba }}</span>
                                    Mengikuti Baitul Arqom
                                @else
                                    <span class="badge badge-danger capitalize">{{ $is_ba }}</span>
                                    Tidak Mengikuti Baitul Arqom
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            @if ($is_ba == 'sudah')
                                <div class="col-md-4">Tahun Baitul Arqom</div>
                                <div class="col-md-8">: {{ $tahun_ba }}</div>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">Status Perkawinan</div>
                            <div class="col-md-8" style="text-transform: capitalize;">: {{ $status_kawin }}
                            </div>
                        </div>
                        @if ($profesi !== '17')
                            <div class="row mb-2">
                                <div class="col-md-4">Profesi</div>
                                <div class="col-md-8">: {{ $profesi }}</div>
                            </div>
                        @else
                            <div class="row mb-2">
                                <div class="col-md-4">Profesi</div>
                                <div class="col-md-8">: {{ $profesi_lain }}</div>
                            </div>
                        @endif

                        @if ($pekerjaan !== '4')
                            <div class="row mb-2">
                                <div class="col-md-4">Pekerjaan</div>
                                <div class="col-md-8">: {{ $pekerjaan }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">Tempat Kerja</div>
                                <div class="col-md-8">: {{ $tempat_kerja }}</div>
                            </div>
                        @else
                            <div class="row mb-2">
                                <div class="col-md-4">Pekerjaan</div>
                                <div class="col-md-8">: {{ $pekerjaan }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $foto) }}" alt=""
                                style="width: 100px; height: 120px; object-fit: cover;">
                        </div>
                        <div class="text-center">
                            <h4> {{ $no_anggota }}</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($statAdd)
        <div class="card">
            <div class="card-header header-elements-inline">
                @if ($updatedata == false)
                    <h5 class="card-title">Form Tambah Anggota</h5>
                @else
                    <h5 class="card-title">Form Update Anggota</h5>
                @endif
                <div class="header-elements">
                    <div class="list-icons">
                        {{-- <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a> --}}
                        <a wire:click="closeform" class="list-icons-item" data-action="remove"></a>
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
                                                    $($el).val($($el).val()).trigger('change');" wire:model.live="cabang"
                                                        wire:change='updateListType'
                                                        class="form-control form-control-select2">
                                                        <option value="">Pilih</option>
                                                        @foreach ($cabangs as $list)
                                                            <option value="{{ $list->cabang_cd }}">
                                                                {{ $list->cabang_nm }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('cabang')
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Ranting <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select x-init="$($el).select2({ placeholder: 'Pilih Cabang' });
                                                    $($el).on('change', function() {
                                                        $wire.set('ranting', $($el).val());
                                                    });
                                                    $($el).val('{{ $ranting }}').trigger('change');" // Set the initial value here
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
                                                        <span class="form-text text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Gelar</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" wire:model="gelar_depan"
                                            placeholder="Gelar Depan">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" wire:model="gelar_belakang"
                                            placeholder="Gelar Belakang">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" wire:model="nama"
                                            placeholder="Masukkan nama lengkap">
                                        @error('nama')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Tempat/Tanggal Lahir <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" wire:model="tempat_lahir"
                                            placeholder="Masukkan Tempat Lahir">
                                        @error('tempat_lahir')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar3"></i></span>
                                            </span>
                                            <input type="date" class="form-control" wire:model.live="tgl_lahir"
                                                placeholder="28/12/1995">
                                        </div>
                                        @error('tgl_lahir')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if (Auth::user()->role_id == 1)
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">NIK <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" wire:model="nik"
                                                placeholder="Masukkan NIK">
                                            @error('nik')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                @if ($updatedata == false)
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" wire:model="email"
                                                placeholder="Masukkan email">
                                            @error('email')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">No. HP/Telp <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" wire:model="no_telp"
                                                placeholder="Masukkan nomor hp/telp">
                                            @error('no_telp')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" wire:model="email"
                                                placeholder="Masukkan email" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">No. HP/Telp <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" wire:model="no_telp"
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
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mb-1">
                                    <label class="col-lg-3 col-form-label">Pendidikan Terakhir <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-3">
                                        <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                        $($el).on('change', function() {
                                            $wire.set('pendidikan_terakhir', $($el).val());
                                        });
                                        $($el).val($($el).val()).trigger('change');" wire:model.live="pendidikan_terakhir"
                                            wire:change='updateListType' class="form-control form-control-select2">
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
                                        $($el).val($($el).val()).trigger('change');" wire:model.live="gol_darah"
                                            wire:change='updateListType' class="form-control form-control-select2">
                                            <option value="">Pilih</option>
                                            @foreach ($gol_darahs as $list)
                                                <option value="{{ $list->id }}">{{ $list->nama }}</option>
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
                                                    <input type="radio" name="is_nbm" value="sudah"
                                                        id="sudah" class="form-input-styled"
                                                        wire:model.live="is_nbm">
                                                    Sudah
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="is_nbm" value="belum"
                                                        id="belum" class="form-input-styled"
                                                        wire:model.live="is_nbm">
                                                    Belum
                                                </label>
                                            </div>
                                            @error('is_nbm')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($is_nbm == 'sudah')
                                            <div class="col-lg-7" data-animation="bounceInLeft">
                                                <input type="text" class="form-control" wire:model="no_nbm"
                                                    placeholder="Masukkan Nomor NBM/KTAM">
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group mb-1">
                                    <label class="col-form-label">Pernah Mengikuti Baitul Arqom? <span
                                            class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="is_ba" value="sudah"
                                                        class="form-input-styled" wire:model.live="is_ba">
                                                    Sudah
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="is_ba" value="belum"
                                                        class="form-input-styled" wire:model.live="is_ba">
                                                    Belum
                                                </label>
                                            </div>
                                            @error('is_ba')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($is_ba == 'sudah')
                                            <div class="col-lg-4">
                                                <select x-init="$($el).select2({ placeholder: 'Pilih Cabang' });
                                                $($el).on('change', function() {
                                                    $wire.set('tahun_ba', $($el).val());
                                                });
                                                $($el).val($($el).val()).trigger('change');"name="tahun" id="tahun"
                                                    wire:model.live="tahun_ba"
                                                    class="form-control form-control-select2">
                                                    <option selected="selected">Masukan Tahun BA</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year }}">{{ $year }}
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
                                                    <input type="radio" name="status_kawin" value="menikah"
                                                        class="form-input-styled" wire:model.live="status_kawin"
                                                        checked data-fouc>
                                                    Menikah
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status_kawin" value="belum menikah"
                                                        class="form-input-styled" wire:model.live="status_kawin"
                                                        data-fouc>
                                                    Belum Menikah
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status_kawin" value="duda"
                                                        class="form-input-styled" wire:model.live="status_kawin"
                                                        data-fouc>
                                                    Duda
                                                </label>
                                            </div>
                                        </div>
                                        @error('status_kawin')
                                            <span class="form-text text-danger">{{ $message }}</span>
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
                                            wire:change='updateListType' class="form-control form-control-select2">
                                            <option value="">Pilih</option>
                                            @foreach ($profesis as $list)
                                                <option value="{{ $list->id }}">{{ $list->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('profesi')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" wire:model="profesi_lain"
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
                                        $($el).val($($el).val()).trigger('change');" wire:model.live="pekerjaan"
                                            wire:change='updateListType' class="form-control form-control-select2">
                                            <option value="">Pilih</option>
                                            @foreach ($pekerjaans as $list)
                                                <option value="{{ $list->id }}">{{ $list->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('pekerjaan')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" wire:model="tempat_kerja"
                                            placeholder="Instansi/Tempat Kerja">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Upload Foto <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6" wire:ignore>
                                        @if ($updatedata == true)
                                            <div class="col-lg-3"> <img src="{{ asset('storage/' . $foto) }}"
                                                    alt=""
                                                    style="width: 90px; height: 120px; object-fit: cover;">

                                            </div>
                                        @endif
                                        <input type="file" wire:model="foto" class="file-input"
                                            data-show-caption="true" data-show-upload="true" accept="image/*"
                                            id="fotoInput" data-fouc>
                                    </div>

                                </div>

                                @error('foto')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="text-right">
                            @if ($updatedata == false)
                                <button type="button" class="btn bg-primary-300 btn-labeled btn-labeled-left"
                                    wire:click="store()"><b><i class="icon-paperplane"></i></b>Simpan</button>
                            @else
                                <button type="button" class="btn bg-grey-300 btn-labeled btn-labeled-left"
                                    wire:click="back_store()"><b><i class="icon-rotate-ccw3"></i></b>Kembali</button>
                                <button type="button" class="btn bg-warning-600 btn-labeled btn-labeled-left"
                                    wire:click="updateForm()"><b><i class="icon-paperplane"></i></b>Update</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Daftar Anggota Pemuda Muhammadiyah Kabupaten Wonosobo</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn bg-primary-300 btn-labeled btn-labeled-left" wire:click.prevent='tambah'><b><i
                                class="icon-user-plus"></i></b>Tambah</a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-start ml-3">
                            <label class="col-form-label mr-1">Show :</label>
                            <select wire:model.live="paginate" class="form-control form-control-sm w-auto">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-end mr-2">
                            <label class="col-form-label mr-1">Search :</label>
                            {{-- <input type="text"
                                class="form-control form-control-sm w-auto" wire:model.live="search"> --}}
                            <input type="text" class="form-control form-control-sm w-auto"
                                wire:model.live="search">
                            <div class="form-control-feedback">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table datatable">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>No_Anggota</th>
                            <th>Nama</th>
                            <th>Cabang</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Akun</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataanggota as $value)
                            <tr>
                                <td class="text-center">{{ $loop->index + $dataanggota->firstItem() }}</td>
                                <td class="text-center">{{ $value->no_anggota }}</td>
                                <td>{{ $value->nama }}</td>
                                <td class="text-center">{{ $value->Cabang->cabang_nm }}
                                    <b>({{ $value->cabang }})</b>
                                </td>
                                @if ($value->status == 'Draft')
                                    <td class="text-center"><span
                                            class="badge badge-danger">{{ $value->status }}</span></td>
                                @elseif ($value->status == 'Validasi')
                                    <td class="text-center"><span
                                            class="badge badge-primary">{{ $value->status }}</span></td>
                                @else
                                    <td class="text-center"><span
                                            class="badge badge-success">{{ $value->status }}</span></td>
                                @endif
                                <td class="text-center">
                                    <img src="{{ asset('storage/' . $value->foto) }}" alt="{{ $value->nama }}"
                                        style="width: 30px; height: 40px; object-fit: cover;">
                                </td>
                                <td style="display: flex; justify-content: center; align-items: center;">
                                    <button type="button" wire:click="akun_change({{ $value->id }})"
                                        class="btn
                                               {{ $value->akun == 2 ? 'bg-teal-400 btn-labeled btn-labeled-right' : '' }}
                                               {{ $value->akun == 1 ? 'bg-danger-400 btn-labeled btn-labeled-left' : '' }}
                                               rounded-round">
                                        <b>
                                            <i class="icon-switch"></i>
                                        </b>
                                        <span
                                            class="text {{ $value->akun == 2 ? 'text-teal-400' : '' }} {{ $value->akun == 1 ? 'text-danger-400' : '' }}">&nbsp;</span>

                                    </button>

                                </td>

                                <td class="text-center justify-content-center" style="color: white">

                                    @if (Auth::user()->role_id == 3)
                                        @if ($value->status == 'Draft')
                                            <a wire:click="validasi_draft_to_validasi({{ $value->id }})"
                                                type="button" class="btn btn-success btn-icon btn-sm"><i
                                                    class="icon-checkmark"></i>
                                            @elseif ($value->status == 'Validasi')
                                                <a wire:click="validasi_validasi_to_draft({{ $value->id }})"
                                                    type="button" class="btn btn-danger btn-icon btn-sm"><i
                                                        class="icon-cross2"></i>
                                        @endif
                                    @elseif (Auth::user()->role_id == 1)
                                        @if ($value->status == 'Validasi')
                                            <a wire:click="validasi_validasi_to_verifikasi({{ $value->id }})"
                                                type="button" class="btn btn-success btn-icon btn-sm"><i
                                                    class="icon-checkmark"></i>
                                            @elseif ($value->status == 'Terverifikasi')
                                                <a wire:click="validasi_verifikasi_to_validasi({{ $value->id }})"
                                                    type="button" class="btn btn-danger btn-icon btn-sm"><i
                                                        class="icon-cross2"></i></a>
                                        @endif
                                    @endif
                                    <a wire:click="cek({{ $value->id }})" type="button"
                                        class="btn btn-info btn-icon btn-sm"><i class="icon-eye8"></i>
                                    </a>
                                    @if (Auth::user()->role_id !== 2)
                                        @if (Auth::user()->role_id == 1)
                                            @if ($value->status !== 'Terverifikasi')
                                                <a wire:click="edit({{ $value->id }})" type="button"
                                                    class="btn btn-warning btn-icon btn-sm"><i
                                                        class="icon-pencil"></i>
                                                </a>
                                            @endif
                                            @if ($value->status == 'Draft')
                                                <a wire:click="delete_confirmation({{ $value->id }})"
                                                    type="button" class="btn btn-danger btn-icon btn-sm"><i
                                                        class="icon-trash"></i>
                                                </a>
                                            @endif
                                        @endif

                                        @if ($value->status == 'Terverifikasi')
                                            <a href="#" type="button" class="btn btn-primary btn-icon btn-sm"
                                                data-id="{{ \Illuminate\Support\Facades\Crypt::encryptString($value->id) }}">
                                                <i class="icon-vcard"></i>
                                            </a>
                                            {{-- <a href="#" type="button"
                                            class="btn bg-info-400 btn-icon rounded-round idcardButton"
                                            data-id="{{ $value->id }}">
                                            <i class="icon-printer2"></i>
                                        </a> --}}
                                        @endif
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container mb-2">
                    {{ $dataanggota->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).on('click', '.idcardButton', function() {
            var id = $(this).attr("data-id"); // Ambil nilai ID dari atribut data-id
            var url = "{{ url('idcard') }}?data=" + id; // Ganti placeholder :id dengan nilai id
            var redirectWindow = window.open(url, '_blank');
            redirectWindow.print();
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
@endpush
