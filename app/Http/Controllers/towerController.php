<?php

namespace App\Http\Controllers;

use App\Imports\towerImport;
use App\Models\dataTower;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class towerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = dataTower::with('documents')->orderBy('paket', 'asc')->get();
        return view('datatower', compact('datas'));
    }

    public function viewAdd() {
        return view('addtower');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datower = new dataTower();
        $datower->paket = $request->paket;
        $datower->siteID = $request->siteID;
        $datower->provinsi = $request->provinsi;
        $datower->kabupaten = $request->kabupaten;
        $datower->kecamatan = $request->kecamatan;
        $datower->desa = $request->desa;
        $datower->LM_nonLM = $request->LM_nonLM;
        $datower->koordinat_usulan = $request->koordinat_usulan;
        $datower->koordinatlattUsulan = $request->koordinatlattUsulan;
        $datower->siteName = $request->siteName;
        $datower->status = $request->status;
        $datower->save();

        return redirect()->route('datatower')->with('success', 'Data Berhasil Ditambahkan!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datower = dataTower::find($id);
        $datower->paket = $request->paket;
        $datower->siteID = $request->siteID;
        $datower->provinsi = $request->provinsi;
        $datower->kabupaten = $request->kabupaten;
        $datower->kecamatan = $request->kecamatan;
        $datower->desa = $request->desa;
        $datower->LM_nonLM = $request->LM_nonLM;
        $datower->koordinat_usulan = $request->koordinat_usulan;
        $datower->koordinatlattUsulan = $request->koordinatlattUsulan;
        $datower->siteName = $request->siteName;
        $datower->status = $request->status;
        $datower->update();

        return redirect()->route('datatower')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datower = dataTower::find($id);
        $datower->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function import(Request $request) {
        $file = $request->file('file')->store('public/import');

        Excel::import(new towerImport, $file);

        return back()->with('success', 'Data Berhasil Diimport!');
    }
}
