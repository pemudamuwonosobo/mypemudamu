<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabangs')->truncate();
        // Schema::disableForeignKeyConstraints();
        // Schema::enableForeignKeyConstraints();

        $data = [
            ["cabang_cd" => "001", "cabang_nm" => "KALIKAJAR", "cabang_level" => "1"],
            ["cabang_cd" => "001001", "cabang_nm" => "AL-AMIN", "cabang_root" => "001", "cabang_level" => "2"],
            ["cabang_cd" => "001002", "cabang_nm" => "AL-FALAH", "cabang_root" => "001", "cabang_level" => "2"],
            ["cabang_cd" => "001003", "cabang_nm" => "AL-MANSYUR", "cabang_root" => "001", "cabang_level" => "2"],
            ["cabang_cd" => "001004", "cabang_nm" => "KALIKAJAR", "cabang_root" => "001", "cabang_level" => "2"],
            ["cabang_cd" => "001005", "cabang_nm" => "REJOSARI", "cabang_root" => "001", "cabang_level" => "2"],


            ["cabang_cd" => "002", "cabang_nm" => "KALIWIRO", "cabang_level" => "1"],
            ["cabang_cd" => "002001", "cabang_nm" => "DUREN SAWIT", "cabang_root" => "002", "cabang_level" => "2"],
            ["cabang_cd" => "002002", "cabang_nm" => "JAMBU", "cabang_root" => "002", "cabang_level" => "2"],
            ["cabang_cd" => "002003", "cabang_nm" => "KALIWIRO", "cabang_root" => "002", "cabang_level" => "2"],
            ["cabang_cd" => "002004", "cabang_nm" => "KARANG MANGU", "cabang_root" => "002", "cabang_level" => "2"],
            ["cabang_cd" => "002005", "cabang_nm" => "PAKSAN", "cabang_root" => "002", "cabang_level" => "2"],


            ["cabang_cd" => "003", "cabang_nm" => "KEJAJAR", "cabang_level" => "1"],
            ["cabang_cd" => "003001", "cabang_nm" => "BUNTU", "cabang_root" => "003", "cabang_level" => "2"],
            ["cabang_cd" => "003002", "cabang_nm" => "GATAKSARI", "cabang_root" => "003", "cabang_level" => "2"],
            ["cabang_cd" => "003003", "cabang_nm" => "KEJAJAR BARAT", "cabang_root" => "003", "cabang_level" => "2"],
            ["cabang_cd" => "003004", "cabang_nm" => "KEJAJAR TENGAH", "cabang_root" => "003", "cabang_level" => "2"],
            ["cabang_cd" => "003005", "cabang_nm" => "KEJAJAR TIMUR", "cabang_root" => "003", "cabang_level" => "2"],
            ["cabang_cd" => "003006", "cabang_nm" => "TAMBI", "cabang_root" => "003", "cabang_level" => "2"],



            ["cabang_cd" => "004", "cabang_nm" => "KEPIL", "cabang_level" => "1"],
            ["cabang_cd" => "004001", "cabang_nm" => "BENER 1", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004002", "cabang_nm" => "BENER 2", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004003", "cabang_nm" => "BENER 3", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004004", "cabang_nm" => "BERAN 1", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004005", "cabang_nm" => "BERAN 2", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004006", "cabang_nm" => "BERAN 3", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004007", "cabang_nm" => "GADINGREJO", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004008", "cabang_nm" => "KALIWULUH", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004009", "cabang_nm" => "TANJUNGANOM", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004010", "cabang_nm" => "TEGALGOT", "cabang_root" => "004", "cabang_level" => "2"],
            ["cabang_cd" => "004011", "cabang_nm" => "WARANGAN", "cabang_root" => "004", "cabang_level" => "2"],


            ["cabang_cd" => "005", "cabang_nm" => "KERTEK", "cabang_level" => "1"],
            ["cabang_cd" => "005001", "cabang_nm" => "JAMBUSARI", "cabang_root" => "005", "cabang_level" => "2"],
            ["cabang_cd" => "005002", "cabang_nm" => "KARANGLUHUR", "cabang_root" => "005", "cabang_level" => "2"],
            ["cabang_cd" => "005003", "cabang_nm" => "RECO", "cabang_root" => "005", "cabang_level" => "2"],
            ["cabang_cd" => "005004", "cabang_nm" => "SUDUNGDEWO", "cabang_root" => "005", "cabang_level" => "2"],
            ["cabang_cd" => "005005", "cabang_nm" => "SUMBERDALEM", "cabang_root" => "005", "cabang_level" => "2"],
            ["cabang_cd" => "005006", "cabang_nm" => "YOSOSARI", "cabang_root" => "005", "cabang_level" => "2"],


            ["cabang_cd" => "006", "cabang_nm" => "LEKSONO", "cabang_level" => "1"],
            ["cabang_cd" => "006001", "cabang_nm" => "CAPAR", "cabang_root" => "006", "cabang_level" => "2"],
            ["cabang_cd" => "006002", "cabang_nm" => "LEKSONO", "cabang_root" => "006", "cabang_level" => "2"],
            ["cabang_cd" => "006003", "cabang_nm" => "NGEPOH", "cabang_root" => "006", "cabang_level" => "2"],
            ["cabang_cd" => "006004", "cabang_nm" => "SERAYU", "cabang_root" => "006", "cabang_level" => "2"],


            ["cabang_cd" => "007", "cabang_nm" => "MLANDI", "cabang_level" => "1"],
            ["cabang_cd" => "007001", "cabang_nm" => "MLANDI 1", "cabang_root" => "007", "cabang_level" => "2"],
            ["cabang_cd" => "007002", "cabang_nm" => "MLANDI 2", "cabang_root" => "007", "cabang_level" => "2"],
            ["cabang_cd" => "007003", "cabang_nm" => "MLANDI 3", "cabang_root" => "007", "cabang_level" => "2"],
            ["cabang_cd" => "007004", "cabang_nm" => "MLANDI 4", "cabang_root" => "007", "cabang_level" => "2"],
            ["cabang_cd" => "007005", "cabang_nm" => "MLANDI 5", "cabang_root" => "007", "cabang_level" => "2"],


            ["cabang_cd" => "008", "cabang_nm" => "MOJOTENGAH", "cabang_level" => "1"],
            ["cabang_cd" => "008001", "cabang_nm" => "KALIBEBER 1", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008002", "cabang_nm" => "KALIBEBER 2", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008003", "cabang_nm" => "KALIBEBER 3", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008004", "cabang_nm" => "KALIBEBER 4", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008005", "cabang_nm" => "LARANGAN", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008006", "cabang_nm" => "KLEYANG", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008007", "cabang_nm" => "NDELES", "cabang_root" => "008", "cabang_level" => "2"],
            ["cabang_cd" => "008008", "cabang_nm" => "MUDAL", "cabang_root" => "008", "cabang_level" => "2"],


            ["cabang_cd" => "009", "cabang_nm" => "SAPURAN", "cabang_level" => "1"],
            ["cabang_cd" => "009001", "cabang_nm" => "MARONGSARI", "cabang_root" => "009", "cabang_level" => "2"],
            ["cabang_cd" => "009002", "cabang_nm" => "PECEKELAN", "cabang_root" => "009", "cabang_level" => "2"],

            ["cabang_cd" => "010", "cabang_nm" => "SELOMERTO", "cabang_level" => "1"],
            ["cabang_cd" => "010001", "cabang_nm" => "BANARAN", "cabang_root" => "010", "cabang_level" => "2"],
            ["cabang_cd" => "010002", "cabang_nm" => "MADULIA", "cabang_root" => "010", "cabang_level" => "2"],
            ["cabang_cd" => "010003", "cabang_nm" => "MANGGIS", "cabang_root" => "010", "cabang_level" => "2"],
            ["cabang_cd" => "010004", "cabang_nm" => "MERTOSARI", "cabang_root" => "010", "cabang_level" => "2"],
            ["cabang_cd" => "010005", "cabang_nm" => "POTROWIJAYAN", "cabang_root" => "010", "cabang_level" => "2"],
            ["cabang_cd" => "010006", "cabang_nm" => "SELOMERTO BARAT", "cabang_root" => "010", "cabang_level" => "2"],


            ["cabang_cd" => "011", "cabang_nm" => "SUKOHARJO", "cabang_level" => "1"],
            ["cabang_cd" => "011001", "cabang_nm" => "BANJARSARI", "cabang_root" => "011", "cabang_level" => "2"],
            ["cabang_cd" => "011002", "cabang_nm" => "SAWANGAN", "cabang_root" => "011", "cabang_level" => "2"],
            ["cabang_cd" => "011003", "cabang_nm" => "WONOKERTO", "cabang_root" => "011", "cabang_level" => "2"],


            ["cabang_cd" => "012", "cabang_nm" => "TIENG", "cabang_level" => "1"],
            ["cabang_cd" => "012001", "cabang_nm" => "AL-HIKMAH", "cabang_root" => "012", "cabang_level" => "2"],
            ["cabang_cd" => "012002", "cabang_nm" => "AL-MANSHUR", "cabang_root" => "012", "cabang_level" => "2"],
            ["cabang_cd" => "012003", "cabang_nm" => "DARUSSALAM", "cabang_root" => "012", "cabang_level" => "2"],
            ["cabang_cd" => "012004", "cabang_nm" => "HAWARIYIN", "cabang_root" => "012", "cabang_level" => "2"],
            ["cabang_cd" => "012005", "cabang_nm" => "MUHAJIRIN", "cabang_root" => "012", "cabang_level" => "2"],
            ["cabang_cd" => "012006", "cabang_nm" => "MUJAHIDIN", "cabang_root" => "012", "cabang_level" => "2"],
            ["cabang_cd" => "012007", "cabang_nm" => "ROKI'IN", "cabang_root" => "012", "cabang_level" => "2"],


            ["cabang_cd" => "013", "cabang_nm" => "WADASLINTANG", "cabang_level" => "1"],
            ["cabang_cd" => "013001", "cabang_nm" => "LIMBANGAN TIRIP ", "cabang_root" => "013", "cabang_level" => "2"],

            ["cabang_cd" => "014", "cabang_nm" => "WONOSOBO", "cabang_level" => "1"],
            ["cabang_cd" => "014001", "cabang_nm" => "KEJIWAN", "cabang_root" => "014", "cabang_level" => "2"],
            ["cabang_cd" => "014002", "cabang_nm" => "PANCURWENING", "cabang_root" => "014", "cabang_level" => "2"],
            ["cabang_cd" => "014003", "cabang_nm" => "SIDOJOYO", "cabang_root" => "014", "cabang_level" => "2"],
            ["cabang_cd" => "014004", "cabang_nm" => "SRIBIT", "cabang_root" => "014", "cabang_level" => "2"],
            ["cabang_cd" => "014005", "cabang_nm" => "TAWANGSARI", "cabang_root" => "014", "cabang_level" => "2"],
            ["cabang_cd" => "014006", "cabang_nm" => "WONOSOBO SELATAN", "cabang_root" => "014", "cabang_level" => "2"],
            ["cabang_cd" => "014007", "cabang_nm" => "WONOSOBO TIMUR", "cabang_root" => "014", "cabang_level" => "2"],

        ];

        foreach ($data as $item) {
            Cabang::create($item);
        }
    }
}
