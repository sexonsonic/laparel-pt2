<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index',compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $dosen = new Dosen();
        $dosen->nama = $request->nama;
        $dosen->nipd = $request->nipd;
        $dosen->save();
        return redirect()->route('dosen.index')
                ->with(['message'=>'Dosen berhasil dibuat']);
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.show',compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit',compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->nama = $request->nama;
        $dosen->nipd = $request->nipd;
        $dosen->save();
        return redirect()->route('dosen.index')
                ->with(['message'=>'Dosen berhasil diedit']);
    }

    public function destroy($id)
    {
        $dosen = Dosen::finOrFail($id)->delete();
        return redirect()->route('dosen.index')
                ->with(['message'=>'Dosen berhasil dihapus']);
    }
}
