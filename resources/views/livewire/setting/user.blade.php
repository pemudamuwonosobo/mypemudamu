<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header header-elements-inline">
                    @if ($updatedata == false)
                        <h5 class="card-title">Tambah User</h5>
                    @else
                        <h5 class="card-title">Update User</h5>
                    @endif

                    <div class="header-elements">
                        <div class="list-icons">
                            {{-- <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a> --}}
                            {{-- <a class="list-icons-item" data-action="remove"></a> --}}
                        </div>
                    </div>
                </div>
                {{-- @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif --}}



                <div class="col-md-12">
                    <div class="card-body">
                        <form action="#">
                            <div class="col-lg-12">

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Username<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" wire:model="email"
                                            placeholder="Masukkan Username">
                                        @if ($errors->has('email'))
                                            <div class="pt-1">
                                                <div>
                                                    <p style="color: rgb(255, 78, 78); font-size: small;">
                                                        {{ $errors->first('email') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Password<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" wire:model="password"
                                            placeholder="Masukkan Password">
                                        @if ($errors->has('password'))
                                            <div class="pt-1">
                                                <div>
                                                    <p style="color: rgb(255, 78, 78); font-size: small;">
                                                        {{ $errors->first('password') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ranting">
                                    <label class="col-lg-3 col-form-label">Role_ID <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <select x-init="$($el).select2({
                                            placeholder: 'Pilih '
                                        });
                                        $($el).on('change', function() {
                                            $wire.set('role_id', $($el).val());
                                        });
                                        $($el).val($($el).val());
                                        $($el).trigger('change');" data-placeholder="Pilih Role"
                                            class="form-control form-control-select2" id="role_id"
                                            wire:model.live="role_id" data-fouc>
                                            <option value="">Pilih...</option>
                                            @foreach ($roles as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->id }} - {{ $value->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role_id'))
                                            <div class="pt-1">
                                                <div>
                                                    <p style="color: rgb(255, 78, 78); font-size: small;">
                                                        {{ $errors->first('role_id') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ranting">
                                    <label class="col-lg-3 col-form-label">ID_CABANG <span
                                            class="text-danger"></span></label>
                                    <div class="col-lg-6">
                                        <select x-init="$($el).select2({
                                            placeholder: 'Pilih '
                                        });
                                        $($el).on('change', function() {
                                            $wire.set('cabang_id', $($el).val());
                                        });
                                        $($el).val($($el).val());
                                        $($el).trigger('change');" data-placeholder="Pilih Role"
                                            class="form-control form-control-select2" id="cabang_id"
                                            wire:model.live="cabang_id" data-fouc>
                                            <option value="">Pilih...</option>
                                            @foreach ($cabangs as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->cabang_nm }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('cabang_id'))
                                            <div class="pt-1">
                                                <div>
                                                    <p style="color: rgb(255, 78, 78); font-size: small;">
                                                        {{ $errors->first('cabang_id') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="text-right">
                                @if ($updatedata == false)
                                    <button type="button" class="btn bg-teal" wire:click="store()">Simpan</button>
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
                    <h5 class="card-title">Daftar Role</h5>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ml-3">
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

                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $value)
                            <tr>
                                <td>{{ $loop->index + $users->firstItem() }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->role_id }}</td>
                                <td>
                                    <button wire:click="edit({{ $value->id }})" class="btn btn-success btn-sm"><i
                                            class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger btn-sm"
                                        wire:click='delete_confirmation({{ $value->id }})'>
                                        <i class="fa fa-trash"></i></button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="container mb-2">
                    {{ $users->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>
