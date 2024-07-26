<div>
    @if ($statAdd)
        <div class="card">
            <div class="card-header header-elements-inline">
                @if ($updatedata == false)
                    <h5 class="card-title">Form Tambah Riwayat Perkaderan</h5>
                @else
                    <h5 class="card-title">Form Update Riwayat Perkaderan</h5>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Perkaderan:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" wire:model.live="nama_perkaderan"
                                        placeholder="Masukkan nama perkaderan">

                                    @error('nama_perkaderan')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Penyelenggara:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" wire:model.live="penyelenggara"
                                        placeholder="Masukkan nama perkaderan">

                                    @error('penyelenggara')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tahun:</label>
                                <div class="col-lg-4">
                                    <select x-init="$($el).select2({ placeholder: 'Pilih' });
                                    $($el).on('change', function() {
                                        $wire.set('tahun', $($el).val());
                                    });
                                    $($el).val($($el).val()).trigger('change');" name="tahun" id="tahun"
                                        wire:model.live="tahun" class="form-control form-control-select2">
                                        <option selected="selected">Pilih (awal) </option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun')
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
    @endif
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Riwayat Perkaderan</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn bg-primary-300 btn-labeled btn-labeled-left" wire:click.prevent='tambah'><b><i
                                class="icon-user-plus"></i></b>Tambah</a>
                </div>
            </div>
        </div>
        <table class="table datatable-basic table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Perkaderan</th>
                    <th>Penyelenggara</th>
                    <th>Tahun</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataperkaderan as $value)
                    <tr>
                        <td>{{ $loop->index + $dataperkaderan->firstItem() }}</td>
                        <td>{{ $value->nama_perkaderan }}</td>
                        <td>{{ $value->penyelenggara }}</td>
                        <td>{{ $value->tahun }}</td>
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
        {{ $dataperkaderan->links() }}

    </div>
</div>
