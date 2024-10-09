<?php

namespace App\Http\Controllers;

use App\Models\dokumenUpload;
use Illuminate\Http\Request;

class doxController extends Controller
{
    public function Upload(Request $request, string $id) {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx|max:10000'
        ]);
        $doxup = new dokumenUpload();
        $file = $request->file('document')->store('document', 'public');
        
        $doxup->data_towers_id = $id;
        $doxup->file_path = $file;
        $doxup->file_name = $request->file('document')->getClientOriginalName();
        $doxup->file_type = $request->file('document')->getClientOriginalExtension();
        $doxup->save();

        return redirect()->route('datatower')->with('success', 'Dokumen Berhasil Ditambahkan!');
        return back()->with('error', 'Dokumen Harus Bertipe Data PDF, DOC, DOCX!');
    }

    public function destroy(string $id) {
        $doxup = dokumenUpload::find($id);
        $doxup->delete();

        return back()->with('success', 'Dokumen Berhasil Dihapus');
    }
}
