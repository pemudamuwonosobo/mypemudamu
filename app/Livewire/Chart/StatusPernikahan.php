<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class StatusPernikahan extends Component
{
    public $tahun, $listTahun;
    public $name, $listName;
    public $group, $listGroup;
    public $color;
    public $firstRun = true;
    public $showDataLabels = true;
    public $pnl;
    public $colors = [

        "#F4CE14", "#379777", "#D3D3D3", "#90EE90", "#FFB6C1", "#FFA07A", "#20B2AA", "#87CEFA", "#778899",
        "#B0C4DE", "#FFFFE0"
    ];

    protected $index = -1;

    public function render()
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $maritalStatusData = Anggota::select('status_kawin')
                ->selectRaw('count(*) as count')
                ->groupBy('status_kawin')
                ->get();
        } elseif (auth()->user()->role_id == 3) {
            $akun = User::with('cabangs')->find(auth()->user()->id);
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;
            $maritalStatusData = Anggota::select('status_kawin')
                ->selectRaw('count(*) as count')
                ->groupBy('status_kawin')
                ->where('cabang', $cabangCd)
                ->get();
        }

        $pieChartModel = $maritalStatusData->reduce(
            function ($pieChartModel, $data) {
                $this->index = ($this->index + 1) % count($this->colors);
                return $pieChartModel->addSlice($data->status_kawin, $data->count, $this->colors[$this->index]);
            },

            LivewireCharts::pieChartModel()
                ->setTitle('Status Pernikahan')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->withDataLabels()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
        );
        // dd($pieChartModel);
        return view('livewire.chart.status-pernikahan', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
