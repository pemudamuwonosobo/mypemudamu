<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event QR-Code</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
            font-weight: 200;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .ticket {
            width: 320px;
            background-color: #ffc089;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            color: #333;
        }

        .ticket-header {
            background-color: #ff9b4a;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            color: white;
        }

        .ticket-header h2 {
            margin: 0;
            font-size: 18px;
        }

        .qr-code {
            margin: 10px 0;
            margin-top: 30px;
        }

        .ticket-info {
            background-color: #ffdbb5;
            padding: 10px;
            border-radius: 5px;
        }

        .ticket-info .icon {
            font-size: 20px;
            margin-right: 5px;
            color: maroon;
        }

        .ticket-info h4 {
            margin: 5px 0;
            font-size: 14px;
        }

        .ticket-details {
            font-size: 15px;
            text-align: center;


        }

        .ticket-details div {
            margin: 5px 0;
        }

        .ticket-details span {
            font-weight: bold;
        }

        .footer {
            font-size: 10px;
            margin-top: 15px;
            color: #999;
        }
    </style>
</head>

<body>

    <div class="ticket">
        <div class="ticket-header">
            <h2>MY-PEMUDAMU EVENT</h2>

        </div>
        <div class="qr-code">
            <div class="visible-print">
                {!! QrCode::size(125)->generate(url('/presensi' . \Illuminate\Support\Facades\Crypt::encryptString($data->id))) !!}
            </div>
        </div>

        <div class="ticket-details">
            <div>
                <h3>{{ $data->nama_event }}</h3>
            </div>
        </div>
        <div class="ticket-info">
            <h4><i class="fa-solid fa-calendar-days icon"></i>
                {{ \Carbon\Carbon::parse($data->tanggal_event)->isoFormat('DD MMMM YYYY') }}</h4>
            <h4><i class="fa-solid fa-location-dot icon"></i> {{ $data->lokasi }}</h4>
        </div>

        <div class="footer">
            &copy; 2024 <a href="#"> - Pimpinan Daerah Pemuda Muhammadiyah Wonosobo </a>
        </div>
    </div>

</body>

</html>
