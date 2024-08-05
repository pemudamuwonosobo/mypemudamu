<div class="container">
    <div class="p-2">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var chartData = @json($chartData);

                var data = google.visualization.arrayToDataTable([
                    ['', 'Draft', 'Validasi', 'Terverifikasi'],
                    @foreach ($chartData as $data)
                        ['{{ $data->cabang }}', {{ $data->draft }}, {{ $data->validasi }}, {{ $data->terverifikasi }}],
                    @endforeach
                ]);

                var options = {
                    chart: {
                        title: @json(auth()->user()->role_id == 1 || auth()->user()->role_id == 2
                                ? 'Statistik Anggota Tiap Cabang'
                                : 'Statistik Anggota Tiap Ranting'),
                        subtitle: 'Jumlah Anggota Berdasarkan Status',
                    },
                    bars: 'horizontal', // Required for Material Bar Charts.
                    series: {
                        0: {
                            color: '#dc3545'
                        }, // warna danger
                        1: {
                            color: '#ffc107'
                        }, // warna warning
                        2: {
                            color: '#28a745'
                        } // warna success
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div id="barchart_material" style="width: 800px; height: 500px;"></div>
        {{-- @json($chartData) --}}
    </div>
</div>
