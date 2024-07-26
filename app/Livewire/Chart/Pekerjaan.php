<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Pekerjaan extends Component
{
    public $tahun, $listTahun;
    public $name, $listName;
    public $group, $listGroup;
    public $color;
    public $firstRun = true;
    public $showDataLabels = true;
    public $pnl;
    public $colors = [
        "#88D66C", "#F6FB7A",
        "#B0C4DE", "#FFFFE0", "#FF8225", "#088395", "#667BC6", "#E6B9A6", "#536493", "#508C9B",
    ];

    protected $index = -1;

    public function render()
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $maritalStatusData = Anggota::with('Pekerjaan')
                ->select('pekerjaan')
                ->selectRaw('count(*) as count')
                ->groupBy('pekerjaan')
                ->get()
                ->map(function ($data) {
                    return [
                        'nama' => $data->Pekerjaan->nama,
                        'count' => $data->count
                    ];
                });
        } elseif (auth()->user()->role_id == 3) {
            $akun = User::with('cabangs')->find(auth()->user()->id);
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;
            $maritalStatusData = Anggota::with('Pekerjaan')
                ->select('pekerjaan')
                ->selectRaw('count(*) as count')
                ->groupBy('pekerjaan')
                ->where('cabang', $cabangCd)
                ->get()
                ->map(function ($data) {
                    return [
                        'nama' => $data->Pekerjaan->nama,
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
                ->setTitle('Pekerjaan')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->withDataLabels()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
        );

        return view('livewire.chart.pekerjaan', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
