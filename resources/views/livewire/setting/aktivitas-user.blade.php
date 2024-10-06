<div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Aktivitas User</h5>
        </div>

        <ul class="nav nav-pills nav-fill mt-2 mb-2">
            <li class="nav-item">
                <a class="nav-link active" href="#perubahan" data-toggle="tab">Aktivitas Perubahan Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#login" data-toggle="tab">Aktivitas Login</a>
            </li>
        </ul>

        <!-- Tambahkan div tab-content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="perubahan">
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
                                    <th>User</th>
                                    <th>Event</th>
                                    <th>Before</th>
                                    <th>After</th>
                                    <th>Log At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lastactivityubah as $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + $lastactivityubah->firstItem() }}</td>
                                        <td class="text-center">
                                            @if ($value->user->role_id == 1)
                                                Superadmin
                                            @elseif ($value->user->role_id == 2)
                                                Admin Daerah
                                            @elseif ($value->user->role_id == 3)
                                                Admin PCPM {{ $value->user->cabangs->cabang_nm }}
                                            @elseif ($value->user->role_id == 4)
                                                {{ $value->user->anggota->nama ?? 'Tidak ada anggota' }}
                                            @else
                                                Role tidak diketahui
                                            @endif
                                        </td>

                                        <td>{{ $value->event }}</td>
                                        <td>
                                            @if (@is_array($value->changes['old']))
                                                @foreach ($value->changes['old'] as $key => $valueChange)
                                                    {{ $key }} : {{ $valueChange }} <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if (@is_array($value->changes['attributes']))
                                                @foreach ($value->changes['attributes'] as $key => $valueChange)
                                                    {{ $key }} : {{ $valueChange }} <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $value->created_at->format('d-m-Y H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container mb-2">
                            {{ $lastactivityubah->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="login">
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
                                    <th>User</th>
                                    <th>Description</th>
                                    <th>Log At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lastactivitylogin as $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + $lastactivitylogin->firstItem() }}
                                        </td>
                                        <td class="text-center">
                                            @if ($value->user->role_id == 1)
                                                Superadmin
                                            @elseif ($value->user->role_id == 2)
                                                Admin Daerah
                                            @elseif ($value->user->role_id == 3)
                                                Admin PCPM {{ $value->user->cabangs->cabang_nm }}
                                            @elseif ($value->user->role_id == 4)
                                                {{ $value->user->anggota->nama ?? 'Tidak ada anggota' }}
                                            @else
                                                Role tidak diketahui
                                            @endif
                                        </td>
                                        <td>{{ $value->description }}</td>
                                        <td class="text-center">{{ $value->created_at->format('d-m-Y H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container mb-2">
                            {{ $lastactivitylogin->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
