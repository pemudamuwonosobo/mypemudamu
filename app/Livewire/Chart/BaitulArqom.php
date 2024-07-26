<?php

namespace App\Livewire\Chart;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class BaitulArqom extends Component
{
    public $tahun, $listTahun;
    public $name, $listName;
    public $group, $listGroup;
    public $color;
    public $firstRun = true;
    public $showDataLabels = true;
    public $pnl;
    public $colors = [
        "#536493", "#508C9B", "#88D66C", "#F6FB7A", "#B692C2"
    ];

    protected $index = -1;

    public function render()
    {
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $maritalStatusData = Anggota::select('is_ba')
                ->selectRaw('count(*) as count')
                ->groupBy('is_ba')
                ->get();
        } elseif (auth()->user()->role_id == 3) {
            $akun = User::with('cabangs')->find(auth()->user()->id);
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;

            $maritalStatusData = Anggota::select('is_ba')
                ->selectRaw('count(*) as count')
                ->groupBy('is_ba')
                ->where('cabang', $cabangCd)
                ->get();
        }



        $pieChartModel = $maritalStatusData->reduce(
            function ($pieChartModel, $data) {
                $this->index = ($this->index + 1) % count($this->colors);
                return $pieChartModel->addSlice($data->is_ba, $data->count, $this->colors[$this->index]);
            },

            LivewireCharts::pieChartModel()
                ->setTitle('Baitul Arqom')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                ->legendPositionBottom()
                ->withDataLabels()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
        );
        // dd($pieChartModel);
        return view('livewire.chart.baitul-arqom', [
            'pieChartModel' => $pieChartModel,
        ]);
    }
}
