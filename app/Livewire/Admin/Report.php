<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Report')]

class Report extends Component
{
    use WithPagination;
    // public $dataanggota;
    public $search = '';
    public $paginate = 10;
    public $searchColumn = '';

    public $columns = [
        'nama' => true,
        'cabang' => true,
        'gol_darah' => true,
        'status_kawin' => true,
        'pendidikan_terakhir' => true,
        'pekerjaan' => true,
        'profesi' => true,
    ];

    public function toggleColumn($column)
    {
        $this->columns[$column] = !$this->columns[$column];
    }



    public function render()
    {

        $akun = User::with('cabangs')->find(auth()->user()->id);

        $query = Anggota::query();

        if ($this->search) {
            switch ($this->searchColumn) {
                case 'cabang':
                    $query->whereHas('Cabang', function ($q) {
                        $q->where('cabang_nm', 'like', '%' . $this->search . '%');
                    });
                    break;
                case 'gol_darah':
                    $query->whereHas('GolDarah', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
                    break;
                case 'pekerjaan':
                    $query->whereHas('Pekerjaan', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
                    break;
                case 'profesi':
                    $query->whereHas('Profesi', function ($q) {
                        $q->where('nama', 'like', '%' . $this->search . '%');
                    });
                    break;
                default:
                    $query->where($this->searchColumn, 'like', '%' . $this->search . '%');
            }
        }
        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $anggota = $query->paginate($this->paginate);
        } elseif (auth()->user()->role_id == 3) {
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;
            if ($cabangCd) {
                $query->where('cabang', $cabangCd);
            }

            $anggota = $query->paginate($this->paginate);
        }


        return view('livewire.admin.report', [
            'anggota' => $anggota,
        ]);
    }
}
