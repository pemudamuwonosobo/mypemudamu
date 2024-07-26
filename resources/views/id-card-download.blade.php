<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card - {{ $data->nama }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('costume-dea/style-dea.css') }}" rel="stylesheet" type="text/css">
    <!-- Use the latest version of html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
        .button-info {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .button-info:hover {
            color: #fff;
            background-color: #138496;
            border-color: #117a8b;
        }

        .button-info:focus,
        .button-info.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(58, 176, 195, 0.5);
        }

        .button-info:active,
        .button-info.active {
            color: #fff;
            background-color: #117a8b;
            border-color: #0f6c7a;
            box-shadow: none;
        }

        .button-info:active:focus,
        .button-info.active:focus {
            box-shadow: 0 0 0 0.2rem rgba(58, 176, 195, 0.5);
        }

        .button-info.disabled,
        .button-info:disabled {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8;
            opacity: 0.65;
        }
    </style>

</head>

<body>
    <div class="row">
        <div class="card" id="htmlContent">
            <div class="left-section">
                <img src="{{ asset('storage/' . $data->foto) }}" alt="Profile" class="profile">
                <div class="name">{{ $data->nama }}</div>
                <div class="cabang">PCPM {{ $data->Cabang->cabang_nm }}</div>
            </div>
            <div class="right-section">
                <div class="visible-print">
                    {!! QrCode::size(125)->generate($data->no_anggota) !!}
                </div>
                <div class="id">{{ $data->no_anggota }}</div>
            </div>
        </div>
        <div style="text-align: center;">
            <button onclick="downloadImage()" style="margin-top: 25px;" class="button-info">Download ID Card</button>
        </div>
    </div>

    <script>
        function downloadImage() {
            html2canvas(document.getElementById('htmlContent')).then(canvas => {
                const link = document.createElement('a');
                const fileName = '{{ $data->nama }}.png';
                link.download = fileName;
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        }
    </script>
</body>

</html>
