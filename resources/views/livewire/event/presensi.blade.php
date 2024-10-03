<div>
    <!-- Modal Presensi -->
    <div class="modal fade" id="presensiModal" tabindex="-1" aria-labelledby="presensiModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="presensiModalLabel">
                        {{ $presensi_id ? 'Edit Presensi' : 'Tambah Presensi' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="closeFormPresensi"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $presensi_id ? 'updatePresensi' : 'createPresensi' }}">
                        <div class="mb-3">
                            <label for="eventSelect" class="form-label">Event</label>
                            <select class="form-control @error('event_id') is-invalid @enderror" id="eventSelect"
                                wire:model="event_id">
                                <option value="">Pilih Event</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->nama_event }}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="anggotaId" class="form-label">Anggota ID</label>
                            <input type="text" class="form-control @error('anggota_id') is-invalid @enderror"
                                id="anggotaId" wire:model="anggota_id" placeholder="Masukkan ID Anggota">
                            @error('anggota_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="waktuHadir" class="form-label">Waktu Hadir</label>
                            <input type="datetime-local" class="form-control @error('waktu_hadir') is-invalid @enderror"
                                id="waktuHadir" wire:model="waktu_hadir">
                            @error('waktu_hadir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeFormPresensi"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $presensi_id ? 'Update Presensi' : 'Simpan Presensi' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Tabel Presensi -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Presensi </h5>
            @if (auth()->check())
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="btn btn-outline bg-slate-600 text-slate-600 border-slate btn-sm" href="/event">
                            <b><i class="icon-undo mr-2"></i></b>Kembali
                        </a>
                    </div>
                </div>
            @endif

        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="text-center mb-0"> <!-- Menghapus margin bawah dengan mb-0 -->
                            <h1 class="mb-1">{{ $namaEvent }}</h1> <!-- Mengurangi margin bawah heading -->
                            <h4 class="text-muted mb-1">
                                {{ \Carbon\Carbon::parse($tanggalEvent)->isoFormat('dddd, D MMMM YYYY') }}
                            </h4>
                            <h4 class="mb-2">{{ $lokasiEvent }}</h4> <!-- Mengurangi jarak bawah -->
                        </div>

                        <div class="card shadow-sm bg-danger-400 mb-2"> <!-- Mengurangi margin bawah card -->
                            <div class="card-body text-center">
                                <h5 class="mb-1">Jumlah Presensi</h5>
                                <!-- Mengurangi margin bawah heading di dalam card -->
                                <h1 class="display-4 mb-0">{{ $jumlahpresensi }}</h1>
                                <!-- Menghilangkan margin bawah pada angka presensi -->
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-2"> <!-- Menambahkan sedikit margin atas -->
                            <input type="text" id="search" class="form-control form-control-sm"
                                wire:model.live="search" placeholder="Cari Peserta">
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <!-- QR Reader Section -->
                        <div class="d-flex justify-content-center" wire:ignore>
                            <div id="reader" style="width: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        @foreach ($presensis as $presensi)
            <div class="col-xl-3 col-md-6">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="#">
                                <img src="{{ asset('storage/' . $presensi->anggota->foto) }}"
                                    alt="{{ $presensi->anggota->nama }}"
                                    style="width: 40px; height: 45px; object-fit: cover;">
                            </a>
                        </div>

                        <div class="media-body">
                            <div class="media-title font-weight-semibold text-uppercase">
                                {{ $presensi->anggota->nama ?? '-' }}</div>
                            <span class="text-muted">PCPM {{ $presensi->anggota->Cabang->cabang_nm ?? '-' }}</span>
                        </div>

                        <div class="ml-3 align-self-center" style="color: seagreen">
                            <span><i class="icon-alarm-check"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card mt-2">
        {{ $presensis->links() }}
    </div>
</div>

@push('js')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        let scanningActive = true; // Flag untuk menentukan apakah scanning aktif

        function onScanSuccess(decodedText) {
            if (scanningActive) {
                // Nonaktifkan sementara scanning
                scanningActive = false;

                // Panggil Livewire untuk menangani hasil scan
                @this.handleScan(decodedText);

                // Berikan jeda waktu (misalnya 5 detik) sebelum mengaktifkan kembali scanning
                setTimeout(() => {
                    scanningActive = true;
                }, 5000); // 5000 ms = 5 detik
            }
        }

        function onScanFailure(error) {
            // Handle jika scanning gagal
            console.warn(`Kode tidak terbaca: ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            false
        );
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endpush
