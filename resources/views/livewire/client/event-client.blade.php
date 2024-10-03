<div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Riwayat Event</h5>
        </div>
        <div class="row mb-4">
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
    </div>
    <div class="card">
        <table class="table datatable-basic table-hover">
            <tbody>
                @forelse ($riwayatEvent as $value)
                    <tr>
                        <td class="text-center">
                            <h6 class="mb-0">{{ $loop->index + $riwayatEvent->firstItem() }}</h6>
                            <div class="font-size-sm text-muted line-height-1"></div>
                        </td>
                        <td>
                            <a href="#" class="text-default">
                                <div class="font-weight-semibold text-uppercase">
                                    {{ $value->event->nama_event ?? 'Tidak ada nama event' }}</div>
                                <div class="text-muted font-size-sm"><i class="icon-calendar2 mr-1"></i>
                                    {{ $value->event->tanggal_event ? \Carbon\Carbon::parse($value->event->tanggal_event)->isoFormat('dddd, D MMMM YYYY') : 'Tanggal tidak tersedia' }}
                                    <i class="icon-location3 ml-3 mr-1"></i>
                                    {{ $value->event->lokasi ?? 'Tidak ada lokasi event' }}

                                </div>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada riwayat event yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <!-- Pagination links -->
        <div class="mt-3">
            {{ $riwayatEvent->links() }}
        </div>
    </div>
</div>
