<div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header header-elements-inline">
                    @if ($updatedata == false)
                        <h5 class="card-title">Tambah Data Cabang/Ranting</h5>
                    @else
                        <h5 class="card-title">Update Data Cabang/Ranting</h5>
                    @endif

                    <div class="header-elements">
                        <div class="list-icons">
                            {{-- <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a> --}}
                            {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card-body">
                        <form action="#">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-input-styled" value="1"
                                                            name ="cabang_level" wire:model.live="cabang_level" checked
                                                            data-fouc id="cabang">
                                                        Cabang
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-input-styled" value="2"
                                                            name="cabang_level" wire:model.live="cabang_level" data-fouc
                                                            id="ranting">
                                                        Ranting
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('cabang_level')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 cabang">
                                @if ($cabang_level == '2')
                                    <div class="form-group row ranting">
                                        <label class="col-lg-4 col-form-label">Cabang:</label>
                                        <div class="col-lg-8">
                                            <select x-init="$($el).select2({
                                                placeholder: 'Pilih Cabang'
                                            });
                                            $($el).on('change', function() {
                                                $wire.set('cabang_root', $($el).val());
                                            });
                                            $($el).val($($el).val());
                                            $($el).trigger('change');" data-placeholder="Pilih Cabang"
                                                class="form-control form-control-select2" id="cabang_root"
                                                wire:model="cabang_root" data-fouc>
                                                <option value="">Pilih...</option>
                                                @foreach ($cabangs as $cabang)
                                                    <option value="{{ $cabang->cabang_cd }}">
                                                        {{ $cabang->cabang_cd }} - {{ $cabang->cabang_nm }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cabang_root')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                @endif
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kode:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" wire:model="cabang_cd"
                                            placeholder="Masukkan Kode Cabang/ranting">
                                        @error('cabang_cd')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    @if ($cabang_level == '2')
                                        <label class="col-lg-4 col-form-label">Ranting:</label>
                                    @else
                                        <label class="col-lg-4 col-form-label">Cabang:</label>
                                    @endif
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" wire:model="cabang_nm"
                                            placeholder="Masukkan Nama Cabang/Ranting">
                                        @error('cabang_nm')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Upload SK:</label>
                                    <div class="col-lg-12" wire:ignore>
                                        <input type="file" class="file-input" wire:model="file" data-fouc>
                                        <span class="form-text text-muted">Accepted formats: .pdf Max file size
                                            2Mb</span>
                                    </div>
                                    @error('cabang_level')
                                        <span class="form-text text-danger">{{ $file }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="text-right">
                                @if ($updatedata == false)
                                    <button type="button" class="btn btn-primary" wire:click="store()">Simpan</button>
                                @else
                                    <button type="button" class="btn btn-secondary"
                                        wire:click="back_store()">Kembali</button>
                                    <button type="button" class="btn btn-warning" wire:click="update()">Update</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Data Cabang dan Ranting</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            {{-- <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a> --}}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                </div>
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
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Cabang</th>
                            <th>Cabang/Ranting</th>
                            <th>Keterangan</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datacabangs as $value)
                            <tr>
                                <td>{{ $loop->index + $datacabangs->firstItem() }}</td>
                                <td>{{ $value->cabang_cd }}</td>
                                <td>{{ $value->cabang_nm }}</td>

                                @if ($value->cabang_level == '1')
                                    <td><span class="badge badge-info">Cabang</span></td>
                                @else
                                    <td><span class="badge badge-success">Ranting</span></td>
                                @endif

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a wire:click="edit({{ $value->id }})" class="dropdown-item"><i
                                                        class="icon-pencil"></i>
                                                    Edit</a>
                                                <a
                                                    wire:click='delete_confirmation({{ $value->id }})'class="dropdown-item"><i
                                                        class="icon-trash"></i>
                                                    Hapus</a>
                                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i>
                                                    SK</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container mb-2">
                    {{ $datacabangs->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>
