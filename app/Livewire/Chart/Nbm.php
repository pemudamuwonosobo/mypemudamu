<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class Nbm extends Component
{
    public $tahun, $listTahun;
    public $name, $listName;
    public $group, $listGroup;
    public $color;
    public $firstRun = true;
    public $showDataLabels = true;
    public $pnl;
    public $colors = [

        "#556B2F", "#FF8C00", "#9932CC", "#8B0000", "#E9967A", "#8FBC8F", "#483D8B",
        "#2F4F4F", "#00CED1", "#9400D3", "#ADD8E6", "#F08080", "#E0FFFF", "#FAFAD2",
        "#D3D3D3", "#90EE90", "#FFB6C1", "#FFA07A", "#20B2AA", "#87CEFA", "#778899",
        "#B0C4DE", "#FFFFE0"
    ];

    protected $index = -1;

    public function render()
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $maritalStatusData = Anggota::select('is_nbm')
                ->selectRaw('count(*) as count')
                ->groupBy('is_nbm')
                ->get();
        } elseif (auth()->user()->role_id == 3) {
            $akun = User::with('cabangs')->find(auth()->user()->id);
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;

            $maritalStatusData = Anggota::select('is_nbm')
                ->selectRaw('count(*) as count')
                ->groupBy('is_nbm')
                ->where('cabang', $cabangCd)
                ->get();
        }


        $pieChartModel = $maritalStatusData->reduce(
            function ($pieChartModel, $data) {
                $this->index = ($this->index + 1) % count($this->colors);
                return $pieChartModel->addSlice($data->is_nbm, $data->count, $this->colors[$this->index]);
            },

            LivewireCharts::pieChartModel()
                ->setTitle('Nomor Baku Muhammadiyah')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->withDataLabels()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
        );
        // dd($pieChartModel);
        return view('livewire.chart.nbm', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
