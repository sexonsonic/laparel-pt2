<?php

namespace App\Http\Controllers;

use App\Wali;
use Illuminate\Http\Request;
use App\Mahasiswa;

class WaliController extends Controller
{

    public function index()
    {
        $wali = Wali::with('mahasiswa')->get();
        return view('wali.index', compact('wali'));
    }


    public function create()
    {
        $mhs = Mahasiswa::all();
        return view('wali.create', compact('mhs'));
    }


    public function store(Request $request)
    {
        $wali = new Wali();
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index')
                ->with(['message'=>'Data Berhasil di buat']);
    }


    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show', compact('wali'));
    }


    public function edit($id)
    {
        $mhs = Mahasiswa::all();
        $wali = Wali::findOrFail($id);
        return view('wali.edit', compact('wali','mhs'));
    }


    public function update(Request $request, $id)
    {
        $wali = Wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index')
                ->with(['message'=>'Data Berhasil diubah']);
    }


    public function destroy($id)
    {
        $wali = Wali::findOrFail($id)->delete();
        return redirect()->route('wali.index')
                ->with(['message'=>'Data Berhasil dihapus']);
    }
}
