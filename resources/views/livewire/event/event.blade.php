<div>
    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $event_id ? 'Edit Event' : 'Tambah Event' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        wire:click="CloseFormEvent"aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form wire:submit.prevent="{{ $event_id ? 'update' : 'create' }}">
                        <div class="mb-3">
                            <label for="namaEvent" class="form-label">Nama Event</label>
                            <textarea type="text" class="form-control @error('nama_event') is-invalid @enderror" id="namaEvent"
                                wire:model="nama_event" placeholder="Masukkan Nama Event"></textarea>
                            @error('nama_event')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggalEvent" class="form-label">Tanggal Event</label>
                            <input type="date" class="form-control @error('tanggal_event') is-invalid @enderror"
                                id="tanggalEvent" wire:model="tanggal_event">
                            @error('tanggal_event')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lokasiEvent" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                id="lokasiEvent" wire:model="lokasi" placeholder="Masukkan Lokasi Event">
                            @error('lokasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="CloseFormEvent"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $event_id ? 'Update Event' : 'Simpan Event' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Daftar Event Pemuda Muhammadiyah Wonosobo</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn bg-primary-300 btn-labeled btn-labeled-left btn-sm" wire:click='FormEvent()'><b><i
                                class="icon-user-plus"></i></b>Tambah</a>
                </div>
            </div>
        </div>

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
                            {{-- <input type="text"
                                class="form-control form-control-sm w-auto" wire:model.live="search"> --}}
                            <input type="text" class="form-control form-control-sm w-auto" wire:model.live="search">
                            <div class="form-control-feedback">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal sukses presensi -->
                <div class="modal fade" id="success" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Presensi Berhasil</h5>
                            </div>
                            <div class="modal-body">
                                <p>Presensi telah berhasil disimpan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table datatable">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Daftar Hadir</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td class="text-center">{{ $loop->index + $events->firstItem() }}</td>
                                <td>{{ $event->nama_event }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($event->tanggal_event)->isoFormat('DD MMMM YYYY') }}</td>
                                <td class="text-center">{{ $event->lokasi }}</td>

                                <td class="text-center">
                                    <a href="{{ route('presensi', ['eventId' => \Illuminate\Support\Facades\Crypt::encryptString($event->id)]) }}"
                                        type="button" class="btn btn-link btn-primary">
                                        <i class="icon-forward3"></i>
                                    </a>
                                </td>

                                {{-- <td class="text-center"><a
                                    href="{{ route('penerimaan', $event->id) }}"
                                        class="btn btn-sm btn-primary"><i class="fas fa-forward"></i></a>
                                </td> --}}
                                <td class="text-center justify-content-center" style="color: white">

                                    <a wire:click="edit({{ $event->id }})" type="button"
                                        class="btn btn-warning btn-icon btn-sm"><i class="icon-pencil"></i>
                                    </a>

                                    <a wire:click="delete_confirmation({{ $event->id }})" type="button"
                                        class="btn btn-danger btn-icon btn-sm"><i class="icon-trash"></i>
                                    </a>
                                    <a href="#" type="button"
                                        class="btn btn-primary btn-icon btn-sm eventdownloadButton"
                                        data-id="{{ \Illuminate\Support\Facades\Crypt::encryptString($event->id) }}">
                                        <i class="icon-qrcode"></i>
                                    </a>
                                    <!-- Blade template -->


                                    <!-- Copy Button -->
                                    <button onclick="copyToClipboard()" id="copyLink"
                                        class="btn bg-slate btn-icon btn-sm"
                                        value="{{ url('/presensi' . \Illuminate\Support\Facades\Crypt::encryptString($event->id)) }}">
                                        <i class="icon-hyperlink"></i></button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container mb-2">
                    {{ $events->links('livewire::bootstrap') }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        input#copyLink {
            border: 1px solid #ccc;
            padding: 5px;
            margin-right: 5px;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = document.getElementById('EventModal');
            var eventInput = document.getElementById('nama_eventInput');
            var tanggalInput = document.getElementById('tanggal_eventInput');
            var lokasiInput = document.getElementById('lokasiInput');

            myModal.addEventListener('shown.bs.modal', function() {
                if (nama_eventInput) {
                    eventInput.focus();
                } else if (tanggal_eventInput) {
                    tanggal_eventInput.focus();
                } else if (lokasiInput) {
                    lokasiInput.focus();
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.eventdownloadButton', function() {
            var id = $(this).attr("data-id"); // Ambil nilai ID dari atribut data-id
            var url = "{{ url('event-card') }}?data=" + id; // Ganti placeholder :id dengan nilai id
            var redirectWindow = window.open(url, '_blank');
            redirectWindow.open();
        });
    </script>

    <script>
        function copyToClipboard() {
            // Get the button element by its ID
            var copyButton = document.getElementById("copyLink");

            // Retrieve the value of the button (which contains the URL)
            var copyValue = copyButton.value;

            // Create a temporary input element to copy the text from
            var tempInput = document.createElement("input");
            tempInput.type = "text";
            tempInput.value = copyValue;
            document.body.appendChild(tempInput);

            // Select the text field and copy its content
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");

            // Remove the temporary input element
            document.body.removeChild(tempInput);

            // Optional: Show an alert or message confirming that the link has been copied
            alert("Link copied to clipboard: " + copyValue);
        }
    </script>
@endpush
