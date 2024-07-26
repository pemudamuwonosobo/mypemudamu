<?php

namespace App\Livewire\Chart;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Usia extends Component
{
    public $firstRun = true;
    public $showDataLabels = true;
    public $colors = [
        "#088395", "#667BC6", "#E6B9A6",
        "#B0C4DE", "#FFFFE0", "#FF8225",
    ];

    protected $index = -1;

    public function render()
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $now = Carbon::now();

            // Calculate age ranges
            $under20 = Anggota::where('tgl_lahir', '>', $now->copy()->subYears(20))->count();
            $between20and30 = Anggota::whereBetween('tgl_lahir', [$now->copy()->subYears(30), $now->copy()->subYears(20)])->count();
            $above30 = Anggota::where('tgl_lahir', '<', $now->copy()->subYears(30))->count();

            // Prepare data for the chart
            $ageRanges = collect([
                ['range' => 'Di bawah 20 tahun', 'count' => $under20],
                ['range' => '20-30 tahun', 'count' => $between20and30],
                ['range' => 'Di atas 30 tahun', 'count' => $above30],
            ]);
        } elseif (auth()->user()->role_id == 3) {
            // Ambil data pengguna dan cabangnya
            $akun = User::with('cabangs')->find(auth()->user()->id);
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;

            $now = Carbon::now();

            // Hitung jumlah anggota berdasarkan rentang usia
            $under20 = Anggota::where('cabang', $cabangCd)
                ->where('tgl_lahir', '>', $now->copy()->subYears(20))
                ->count();

            $between20and30 = Anggota::where('cabang', $cabangCd)
                ->whereBetween('tgl_lahir', [$now->copy()->subYears(30), $now->copy()->subYears(20)])
                ->count();

            $above30 = Anggota::where('cabang', $cabangCd)
                ->where('tgl_lahir', '<', $now->copy()->subYears(30))
                ->count();

            // Siapkan data untuk chart
            $ageRanges = collect([
                ['range' => 'Di bawah 20 tahun', 'count' => $under20],
                ['range' => '20-30 tahun', 'count' => $between20and30],
                ['range' => 'Di atas 30 tahun', 'count' => $above30],
            ]);
        }


        // Create the pie chart model
        $pieChartModel = $ageRanges->reduce(
            function ($pieChartModel, $data) {
                $this->index = ($this->index + 1) % count($this->colors);
                return $pieChartModel->addSlice($data['range'], $data['count'], $this->colors[$this->index]);
            },
            LivewireCharts::pieChartModel()
                ->setTitle('Range Usia Anggota')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->withDataLabels()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
        );

        return view('livewire.chart.usia', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
