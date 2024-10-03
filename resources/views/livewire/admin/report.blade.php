<div>
    <style>
        /* General styles */
        .filter-section,
        .search-section {
            margin-bottom: 1rem;
            margin-top: 1rem;
        }

        .filter-label {
            margin-right: 1rem;
        }

        .filter-checkboxes label {
            display: inline-flex;
            align-items: center;
            margin-right: 1rem;
        }

        .search-section span {
            margin-right: 1rem;
        }

        /* Responsive styles */
        @media (min-width: 768px) {
            .filter-checkboxes {
                display: flex;
                flex-wrap: wrap;
            }

            .search-section {
                display: flex;
                /* flex-wrap: wrap; */
                align-items: center;
            }

            .search-section .form-control {
                margin-right: 1rem;
                max-width: 150px;
            }
        }

        @media (max-width: 767px) {
            .filter-checkboxes {
                display: block;
            }

            .search-section {
                display: block;
            }

            .search-section .form-control {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>

    <div class="col-md-12">
        <div class="card">
            <div class="container-fluid">
                <!-- Filter Section -->
                <div class="filter-section">
                    <label class="filter-label">Select columns :</label>
                    <div class="filter-checkboxes">
                        <label><input type="checkbox" wire:model.live="columns.nama"> Nama</label>
                        <label><input type="checkbox" wire:model.live="columns.cabang"> Cabang</label>
                        <label><input type="checkbox" wire:model.live="columns.gol_darah"> Gol. Darah</label>
                        <label><input type="checkbox" wire:model.live="columns.status_kawin"> Status Kawin</label>
                        <label><input type="checkbox" wire:model.live="columns.pendidikan_terakhir"> Pendidikan
                            Terakhir</label>
                        <label><input type="checkbox" wire:model.live="columns.pekerjaan"> Pekerjaan</label>
                        <label><input type="checkbox" wire:model.live="columns.profesi"> Profesi</label>
                    </div>
                </div>

                <!-- Search Section -->
                <div class="search-section">
                    <span>Search by :</span>
                    <select class="form-control" wire:model.live="searchColumn">
                        <option value="">Pilih...</option>
                        <option value="nama">Nama</option>
                        <option value="cabang">Cabang</option>
                        <option value="gol_darah">Gol. Darah</option>
                        <option value="status_kawin">Status Kawin</option>
                        <option value="pendidikan_terakhir">Pendidikan Terakhir</option>
                        <option value="pekerjaan">Pekerjaan</option>
                        <option value="profesi">Profesi</option>
                    </select>
                    <input type="text" class="form-control" wire:model.live.debounce.500ms="search"
                        placeholder="Cari...">
                </div>

                <!-- Table Section -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            @if ($columns['nama'])
                                <th>Nama</th>
                            @endif
                            @if ($columns['cabang'])
                                <th>Cabang</th>
                            @endif
                            @if ($columns['gol_darah'])
                                <th>Gol. Darah</th>
                            @endif
                            @if ($columns['status_kawin'])
                                <th>Status Kawin</th>
                            @endif
                            @if ($columns['pendidikan_terakhir'])
                                <th>Pendidikan Terakhir</th>
                            @endif
                            @if ($columns['pekerjaan'])
                                <th>Pekerjaan</th>
                            @endif
                            @if ($columns['profesi'])
                                <th>Profesi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $member)
                            <tr>
                                <td class="text-center">{{ $loop->index + $anggota->firstItem() }}</td>
                                @if ($columns['nama'])
                                    <td>{{ $member->nama }}</td>
                                @endif
                                @if ($columns['cabang'])
                                    <td>{{ $member->Cabang->cabang_nm }}</td>
                                @endif
                                @if ($columns['gol_darah'])
                                    <td>{{ $member->GolDarah->nama }}</td>
                                @endif
                                @if ($columns['status_kawin'])
                                    <td style="text-transform: capitalize;">{{ $member->status_kawin }}</td>
                                @endif
                                @if ($columns['pendidikan_terakhir'])
                                    <td>{{ $member->pendidikan_terakhir }}</td>
                                @endif
                                @if ($columns['pekerjaan'])
                                    <td>{{ $member->Pekerjaan->nama }}</td>
                                @endif
                                @if ($columns['profesi'])
                                    <td>{{ $member->Profesi->nama }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $anggota->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>
    </div>

</div>
