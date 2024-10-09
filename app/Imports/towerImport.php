<?php

namespace App\Imports;

use App\Models\dataTower;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class towerImport implements ToModel, SkipsOnFailure, SkipsEmptyRows, WithHeadingRow
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new dataTower([
            'paket' => $row['paket'],
            'siteID' => $row['site_id'],
            'provinsi' => $row['provinsi'],
            'kabupaten' => $row['kabupaten'],
            'kecamatan' => $row['kecamatan'],
            'desa' => $row['desa'],
            'LM_nonLM' => $row['lm_non_lm'],
            'koordinat_usulan' => $row['koordinat_usulan'],
            'koordinatlattUsulan' => $row['koordinat_latt_usulan'],
            'siteName' => $row['site_name'],
            'status' => $row['status_lahan'],
        ]);
    }
}
