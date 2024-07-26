<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cabang' => 'required',
            'ranting' => 'required',
            'gelar_depan' => 'nullable',
            'gelar_belakang' => 'nullable',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:anggotas,email',
            'no_telp' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            'pendidikan_terakhir' => 'required',
            'is_nbm' => 'required',
            'no_nbm' => 'nullable',
            'is_ba' => 'required',
            'tahun_ba' => 'nullable',
            'status_kawin' => 'required',
            'profesi' => 'required',
            'profesi_lain' => 'nullable',
            'tempat_kerja' => 'nullable',
            'pekerjaan' => 'required',
            'foto' => 'required',
            // |mimes:jpeg,png,jpg,gif,svg|max:2048
        ];
    }

    public function messages()
    {
        return [
            'cabang.required' => 'Cabang wajib diisi !',
            'ranting.required' => 'Ranting wajib diisi !',
            'nama.required' => 'Nama wajib diisi !',
            'tempat_lahir.required' => 'Tempat wajib diisi !',
            'tgl_lahir.required' => 'Tanggal wajib diisi !',
            'nik.required' => 'NIK wajib diisi !',
            'email.required' => 'E-mail wajib diisi !',
            'email.email' => 'E-mail tidak valid!',
            'email.unique' => 'E-mail sudah digunakan, silahkan ganti!',
            'no_telp.required' => 'No_Telp wajib diisi !',
            'alamat.required' => 'Alamat wajib diisi !',
            'gol_darah.required' => 'Golongan darah wajib diisi !',
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib diisi !',
            'is_nbm.required' => 'Pertanyaan wajib dipilih !',
            'is_ba.required' => 'Pertanyaan wajib dipilih !',
            'status_kawin.required' => 'Pertanyaan wajib dipilih !',
            'profesi.required' => 'Profesi wajib diisi !',
            'pekerjaan.required' => 'Pekerjaan wajib diisi !',
            'foto.required' => 'Foto wajib diisi !',
            // 'foto.mimes' => 'Foto harus memiliki format: jpeg, png, jpg, gif, svg!',
            // 'foto.max' => 'Ukuran foto maksimal adalah 2MB!',
        ];
    }
}
