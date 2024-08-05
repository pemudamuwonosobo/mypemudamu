<?php

namespace App\Livewire\Chart;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class StatistikCabang extends Component
{
    public $chartData;

    public function mount()
    {
        $akun = User::with('cabangs')->find(auth()->user()->id);
        $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;
        $defaultRow = (object) [
            'cabang_cd' => 'default_cd',
            'cabang' => 'Default Cabang',
            'draft' => 0,
            'validasi' => 0,
            'terverifikasi' => 0
        ];

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $this->chartData = collect([$defaultRow])
                ->merge(
                    DB::table('cabangs')
                        ->leftJoin('anggotas', 'cabangs.cabang_cd', '=', 'anggotas.cabang')
                        ->select(
                            'cabangs.cabang_cd',
                            'cabangs.cabang_nm as cabang',
                            DB::raw('count(case when anggotas.status = "draft" then 1 end) as draft'),
                            DB::raw('count(case when anggotas.status = "validasi" then 1 end) as validasi'),
                            DB::raw('count(case when anggotas.status = "terverifikasi" then 1 end) as terverifikasi')
                        )
                        ->where('cabangs.cabang_level', 1)
                        ->groupBy('cabangs.cabang_cd', 'cabangs.cabang_nm')
                        ->get()
                        ->map(function ($item) {
                            $item->draft_color = 'danger';
                            $item->validasi_color = 'warning';
                            $item->terverifikasi_color = 'success';
                            return $item;
                        })

                );
        } elseif (auth()->user()->role_id == 3) {
            $this->chartData = collect([$defaultRow])
                ->merge(
                    DB::table('cabangs')
                        ->leftJoin('anggotas', 'cabangs.cabang_cd', '=', 'anggotas.ranting')
                        ->select(
                            'cabangs.cabang_cd',
                            'cabangs.cabang_nm as cabang',
                            DB::raw('count(case when anggotas.status = "draft" then 1 end) as draft'),
                            DB::raw('count(case when anggotas.status = "validasi" then 1 end) as validasi'),
                            DB::raw('count(case when anggotas.status = "terverifikasi" then 1 end) as terverifikasi')
                        )
                        ->where('cabangs.cabang_level', 2)
                        ->where('cabangs.cabang_root', $cabangCd)
                        ->groupBy('cabangs.cabang_cd', 'cabangs.cabang_nm')
                        ->get()
                        ->map(function ($item) {
                            $item->draft_color = 'danger';
                            $item->validasi_color = 'warning';
                            $item->terverifikasi_color = 'success';
                            return $item;
                        })
                );
        }
        // dd($this->chartData);
    }


    public function render()
    {
        return view('livewire.chart.statistik-cabang');
    }
}
