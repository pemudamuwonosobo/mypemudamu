<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ID Card - {{ $data->nama }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
            rel="stylesheet">

    </head>
    @if ($data->status == 'Terverifikasi')

        <body class="id-card" onload="autoClick();">
            <div class="card-id" id="htmlContent">
                <div class="left-section">
                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Profile" class="profile">
                    <div class="name">{{ $data->nama }}</div>
                    <div class="cabang">PCPM {{ $data->Cabang->cabang_nm }}</div>
                </div>
                <div class="right-section">
                    <div class="visible-print">
                        {!! QrCode::size(85)->generate($data->no_anggota) !!}
                    </div>
                    <div class="id">{{ $data->no_anggota }}</div>
                </div>
            </div>
        </body>
    @else

        <body class="id-card" onload="autoClick();">
            <div class="card-id" id="htmlContent">
                <div class="left-section">
                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Profile" class="profile">
                    <div class="name">{{ $data->nama }}</div>
                    <div class="cabang">PCPM {{ $data->Cabang->cabang_nm }}</div>
                </div>
                <div class="right-section">
                    <div class="visible-print">
                        @if ($data->status == 'Validasi')
                            <h1><strong>{{ $data->status }}</strong></h1>
                        @else
                            <h1><strong>{{ $data->status }}</strong></h1>
                        @endif

                    </div>
                    {{-- <div class="id">{{ $data->no_anggota }}</div> --}}
                </div>
            </div>
        </body>
    @endif
</div>

</html>
@push('css')
    <link href="{{ asset('costume-dea/style-idcard.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
@endpush
