<div>
    <div class="card">
        <div class="card-header header-elements-inline">
            @if ($updatedata == false)
                <h5 class="card-title">Form Tambah Riwayat Organisasi</h5>
            @else
                <h5 class="card-title">Form Update Riwayat Organisasi</h5>
            @endif
            <div class="header-elements">
                {{-- <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div> --}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="card-body">
                <form action="#">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Anggota:</label>
                            <div class="col-lg-6">
                                <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                $($el).on('change', function() {
                                    $wire.set('id_anggota', $($el).val());
                                });
                                $($el).val($($el).val()).trigger('change');" wire:model.live="id_anggota"
                                    class="form-control form-control-select2">
                                    <option value="">Pilih</option>
                                    @foreach ($anggotas as $list)
                                        <option value="{{ $list->id }}">
                                            {{ $list->nama }} - {{ $list->no_anggota }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_anggota')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="organisasi_type" value="internal" id="internal"
                                                class="form-input-styled" wire:model.live="organisasi_type">
                                            Internal
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="organisasi_type" value="eksternal"
                                                id="eksternal" class="form-input-styled"
                                                wire:model.live="organisasi_type">
                                            Eksternal
                                        </label>
                                    </div>
                                    @error('organisasi_type')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if ($organisasi_type == 'internal')
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tingkat Organisasi:</label>
                                <div class="col-lg-4">
                                    <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                    $($el).on('change', function() {
                                        $wire.set('tingkat', $($el).val());
                                    });
                                    $($el).val($($el).val()).trigger('change');" wire:model.live.live="tingkat"
                                        class="form-control form-control-select2">
                                        <option value="">Pilih</option>
                                        <option value="PR">PR - Pimpinan Ranting</option>
                                        <option value="PC">PC - Pimpinan Cabang</option>
                                        <option value="PD">PD - Pimpian Daerah</option>
                                        <option value="PW">PW - Pimpinan Wilayah</option>
                                        <option value="PP">PP - Pimpinan Pusat</option>
                                    </select>
                                    @error('tingkat')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{ $tingkat }}
                        @endif
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Organisasi:</label>
                            <div class="col-lg-8">
                                @if ($organisasi_type == 'internal')
                                    <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                    $($el).on('change', function() {
                                        $wire.set('nama_organisasi', $($el).val());
                                    });
                                    $($el).val($($el).val()).trigger('change');" wire:model.live.live="nama_organisasi"
                                        class="form-control form-control-select2">
                                        <option value="">Pilih</option>
                                        <option value="Muhammadiyah">Muhammadiyah</option>
                                        <option value="Tapak Suci Putera Muhammadiyah">Tapak Suci Putera
                                            Muhammadiyah</option>
                                        <option value="Hizbul Wathan">Hizbul Wathan</option>
                                        <option value="Pemuda Muhammadiyah">Pemuda Muhammadiyah</option>
                                        <option value="Ikatan Mahasiswa Muhammadiyah">Ikatan Mahasiswa Muhammadiyah
                                        </option>
                                        <option value="Ikatan Pelajar Muhammadiyah">Ikatan Pelajar Muhammadiyah
                                        </option>
                                    </select>
                                @else
                                    <input type="text" class="form-control" wire:model.live="nama_organisasi"
                                        placeholder="Masukkan nama sekolah">
                                @endif
                                @error('nama_organisasi')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Periode:</label>
                            <div class="col-lg-4">
                                <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                $($el).on('change', function() {
                                    $wire.set('periode_awal', $($el).val());
                                });
                                $($el).val($($el).val()).trigger('change');" name="tahun" id="tahun"
                                    wire:model.live="periode_awal" class="form-control form-control-select2">
                                    <option selected="selected">Pilih (awal) </option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('periode_awal')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                $($el).on('change', function() {
                                    $wire.set('periode_akhir', $($el).val());
                                });
                                $($el).val($($el).val()).trigger('change');" name="tahun" id="tahun"
                                    wire:model.live="periode_akhir" class="form-control form-control-select2">
                                    <option selected="selected">Pilih (akhir)</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('periode_akhir')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
                                wire:click="update()"><b><i class="icon-paperplane"></i></b>Update</button>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Riwayat Organisasi</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <table class="table datatable-basic table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Anggota</th>
                    <th>Organisasi</th>
                    <th>Periode</th>
                    <th>Jenis Organisasi</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataOrganisasi as $value)
                    <tr>
                        <td>{{ $loop->index + $dataOrganisasi->firstItem() }}</td>
                        <td>{{ $value->Anggota->nama }}</td>
                        <td>{{ $value->tingkat }} {{ $value->nama_organisasi }}</td>
                        <td>{{ $value->periode_awal }} - {{ $value->periode_akhir }}</td>
                        @if ($value->organisasi_type == 'internal')
                            <td><span class="badge bg-success"
                                    style="text-transform: capitalize; text-align:center;">{{ $value->organisasi_type }}</span>
                            </td>
                        @else
                            <td><span class="badge bg-warning"
                                    style="text-transform: capitalize; text-align:center;">{{ $value->organisasi_type }}</span>
                            </td>
                        @endif
                        <td class="text-center justify-content-center">
                            <a wire:click="edit({{ $value->id }})" type="button"
                                class="btn bg-warning-400 btn-icon rounded-round">
                                <i class="icon-pencil"></i>
                            </a>
                            <a wire:click="delete_confirmation({{ $value->id }})" type="button"
                                class="btn bg-danger-400 btn-icon rounded-round">
                                <i class="icon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $dataOrganisasi->links() }}

    </div>
</div>