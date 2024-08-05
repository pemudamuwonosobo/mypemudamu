<div class="content">
    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card bg-teal-400">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h1 class="font-weight-semibold mb-0">{{ $jumlahCabang }}</h1>
                                <h4 class="font-weight-semibold mb-0">Jumlah Cabang</h4>
                            </div>
                            <div class="col-auto">
                                <div class="card bg-white p-3 d-flex align-items-center justify-content-center"
                                    style="width: 80px; height: 80px;">
                                    <i class="icon-database4" style="font-size: 48px; color: #26a69a;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card bg-success-400">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h1 class="font-weight-semibold mb-0">{{ $jumlahRanting }}</h1>
                                <h4 class="font-weight-semibold mb-0">Jumlah Ranting</h4>
                            </div>
                            <div class="col-auto">
                                <div class="card bg-white p-3 d-flex align-items-center justify-content-center"
                                    style="width: 80px; height: 80px;">
                                    <i class="icon-database-menu" style="font-size: 48px; color: #4caf50;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card bg-teal-400">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="font-weight-semibold mb-0">{{ $jumlahAnggota }}</h1>
                            <h4 class="font-weight-semibold mb-0">Total Anggota</h4>
                        </div>
                        <div class="col-auto">
                            <div class="card bg-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="icon-users4" style="font-size: 48px; color: #26a69a;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card bg-success-400">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="font-weight-semibold mb-0">{{ $verifikasiAnggota }}</h1>
                            <h4 class="font-weight-semibold mb-0">Terverifikasi</h4>
                        </div>
                        <div class="col-auto">
                            <div class="card bg-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="icon-user-tie" style="font-size: 48px; color: #4caf50;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card bg-warning-400">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="font-weight-semibold mb-0">{{ $validasiAnggota }}</h1>
                            <h4 class="font-weight-semibold mb-0">Validasi</h4>
                        </div>
                        <div class="col-auto">
                            <div class="card bg-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="icon-user-check" style="font-size: 48px; color: #FF6E31;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card bg-danger-400">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="font-weight-semibold mb-0">{{ $draftAnggota }}</h1>
                            <h4 class="font-weight-semibold mb-0">Draft</h4>
                        </div>
                        <div class="col-auto">
                            <div class="card bg-white p-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="icon-user-minus" style="font-size: 48px; color: #FF4C4C;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <livewire:chart.statistik-cabang>
            </div>
        </div>
    </div>

    {{-- tabel --}}
    {{-- <div class="card">
        <div class="table-responsive">
            <table class="table datatable table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                            <th>Kode Cabang</th>
                            <th>Nama Cabang</th>
                        @else
                            <th>Kode Rating</th>
                            <th>Nama Ranting</th>
                        @endif
                        <th>Draft</th>
                        <th>Validasi</th>
                        <th>Verifikasi</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cabangData as $index => $data)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $data->cabang_cd }}</td>
                            <td>{{ $data->cabang_nm }}</td>
                            <td class="text-center">{{ $data->draft_count }}</td>
                            <td class="text-center">{{ $data->validasi_count }}</td>
                            <td class="text-center">{{ $data->verifikasi_count }}</td>
                            <td class="text-center">{{ $data->total_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">Total</th>
                        <th class="text-center">{{ $totals['draft'] }}</th>
                        <th class="text-center">{{ $totals['validasi'] }}</th>
                        <th class="text-center">{{ $totals['terverifikasi'] }}</th>
                        <th class="text-center">{{ $totals['total'] }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div> --}}
    {{-- end table --}}

    <div class="row">
        <div class="col-md-3">
            <livewire:chart.status-pernikahan>
        </div>
        <div class="col-md-3">
            <livewire:chart.gol-darah>
        </div>
        <div class="col-md-3">
            <livewire:chart.nbm>
        </div>
        <div class="col-md-3">
            <livewire:chart.baitul-arqom>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-3">
            <livewire:chart.pendidikan_terakhir>
        </div>
        <div class="col-md-3">
            <livewire:chart.pekerjaan>
        </div>
        <div class="col-md-3">
            <livewire:chart.profesi>
        </div>
        <div class="col-md-3">
            <livewire:chart.usia>
        </div>
    </div>

</div>
