<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class GolDarah extends Component
{
    public $tahun, $listTahun;
    public $name, $listName;
    public $group, $listGroup;
    public $color;
    public $firstRun = true;
    public $showDataLabels = true;
    public $pnl;
    public $colors = [
        "#FF8225", "#088395", "#667BC6", "#E6B9A6", "#36BA98", "#F4A261", "#729762",
        "#B0C4DE", "#FFFFE0"
    ];

    protected $index = -1;

    public function render()
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            // Get the data and count based on blood type
            $maritalStatusData = Anggota::with('golDarah')
                ->select('gol_darah')
                ->selectRaw('count(*) as count')
                ->groupBy('gol_darah')
                ->get()
                ->map(function ($data) {
                    return [
                        'nama' => $data->golDarah->nama,
                        'count' => $data->count
                    ];
                });
        } elseif (auth()->user()->role_id == 3) {
            $akun = User::with('cabangs')->find(auth()->user()->id);
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;

            // Get the data and count based on blood type
            $maritalStatusData = Anggota::with('golDarah')
                ->select('gol_darah')
                ->selectRaw('count(*) as count')
                ->groupBy('gol_darah')
                ->where('cabang', $cabangCd)
                ->get()
                ->map(function ($data) {
                    return [
                        'nama' => $data->golDarah->nama,
                        'count' => $data->count
                    ];
                });
        }


        // Create the pie chart model
        $pieChartModel = $maritalStatusData->reduce(
            function ($pieChartModel, $data) {
                $this->index = ($this->index + 1) % count($this->colors);
                return $pieChartModel->addSlice($data['nama'], $data['count'], $this->colors[$this->index]);
            },
            LivewireCharts::pieChartModel()
                ->setTitle('Golongan Darah')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->withDataLabels()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
        );

        return view('livewire.chart.gol-darah', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
