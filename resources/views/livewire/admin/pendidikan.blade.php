<div>
    <div class="card">
        <div class="card-header header-elements-inline">
            @if ($updatedata == false)
                <h5 class="card-title">Form Tambah Riwayat Pendidikan</h5>
            @else
                <h5 class="card-title">Form Update Riwayat Pendidikan</h5>
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
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tingkat Sekolah:</label>
                            <div class="col-lg-3">
                                <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                $($el).on('change', function() {
                                    $wire.set('tingkat', $($el).val());
                                });
                                $($el).val($($el).val()).trigger('change');" wire:model.live.live="tingkat"
                                    class="form-control form-control-select2">
                                    <option value="">Pilih</option>
                                    <option value="SD">SD</option>
                                    <option value="MI">MI</option>
                                    <option value="SMP">SMP</option>
                                    <option value="MTs">MTs</option>
                                    <option value="SMA">SMA</option>
                                    <option value="MA">MA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="Diploma 1">Diploma 1</option>
                                    <option value="Diploma 2">Diploma 2</option>
                                    <option value="Diploma 3">Diploma 3</option>
                                    <option value="Diploma 3">Diploma 4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @error('tingkat')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Sekolah:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" wire:model.live="nama_sekolah"
                                    placeholder="Masukkan nama sekolah">
                                @error('nama_sekolah')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tahun Masuk:</label>
                            <div class="col-lg-4">
                                <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                $($el).on('change', function() {
                                    $wire.set('tahun_masuk', $($el).val());
                                });
                                $($el).val($($el).val()).trigger('change');" name="tahun" id="tahun"
                                    wire:model.live="tahun_masuk" class="form-control form-control-select2">
                                    <option selected="selected">Pilih</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_masuk')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tahun Lulus:</label>
                            <div class="col-lg-4">
                                <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                $($el).on('change', function() {
                                    $wire.set('tahun_lulus', $($el).val());
                                });
                                $($el).val($($el).val()).trigger('change');" name="tahun" id="tahun"
                                    wire:model.live="tahun_lulus" class="form-control form-control-select2">
                                    <option selected="selected">Pilih</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_lulus')
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
            <h5 class="card-title">Riwayat Pendidikan</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <table class="table datatable-basic table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Anggota</th>
                    <th>Sekolah</th>
                    <th>Tahun</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datapendidikan as $value)
                    <tr>
                        <td>{{ $loop->index + $datapendidikan->firstItem() }}</td>
                        <td>{{ $value->Anggota->nama }}</td>
                        <td>{{ $value->tingkat }} {{ $value->nama_sekolah }}</td>
                        <td>{{ $value->tahun_masuk }} - {{ $value->tahun_lulus }}</td>
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
        {{ $datapendidikan->links() }}

    </div>
</div>
