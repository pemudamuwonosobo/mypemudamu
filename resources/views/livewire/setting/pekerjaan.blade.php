<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header header-elements-inline">
                    @if ($updatedata == false)
                        <h5 class="card-title">Tambah Pekerjaan</h5>
                    @else
                        <h5 class="card-title">Update Pekerjaan</h5>
                    @endif

                    <div class="header-elements">
                        <div class="list-icons">
                            {{-- <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a> --}}
                            {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="pt-3">
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card-body">
                        <form action="#">
                            <div class="col-lg-12">

                                <div class="form-group row">
                                    <label class="col-lg-6 col-form-label">Pekerjaan:</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" wire:model="nama"
                                            placeholder="Masukkan pekerjaan">
                                    </div>
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Daftar Pekerjaan</h5>
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
                            <input type="text" class="form-control form-control-sm w-auto" wire:model.live="search">
                            <div class="form-control-feedback">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table datatable-basic table-hover text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pekerjaan</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapekerjaans as $key => $value)
                            <tr>
                                <td>{{ $loop->index + $datapekerjaans->firstItem() }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <button wire:click="edit({{ $value->id }})" class="btn btn-success btn-sm"><i
                                            class="fa fa-pencil"></i></button>
                                    {{-- <button wire:click="delete_confirmation({{ $value->id }})"
                                        class="btn btn-danger btn-icon icon-white ml-2" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                    <button class="btn btn-danger btn-sm"
                                        wire:click='delete_confirmation({{ $value->id }})'>
                                        <i class="fa fa-trash"></i></button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container mb-2">
                    {{ $datapekerjaans->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>
