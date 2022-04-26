<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Metode;
use RealRashid\SweetAlert\Facades\Alert;

class MetodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metode = Metode::all();

        return view('metode.index', compact('metode'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $metode = new Metode;

        $metode->nama = $request->nama;
        $metode->deskripsi = $request->deskripsi;
        
        $metode->save();
        
        Alert::success('Berhasil', 'Berhasil Tambah Metode');
        return redirect('metode');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metode = Metode::findOrFail($id);

        return view('metode.show', compact('metode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metode = Metode::findOrFail($id);
        
        return view('metode.edit', compact('metode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $metode = Metode::find($id);

        $metode->nama = $request->nama;
        $metode->deskripsi = $request->deskripsi;
        
        $metode->update();

        Alert::success('Berhasil', 'Berhasil Update Metode');
        return redirect('/metode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metode = Metode::find($id);

        $metode->delete();

        Alert::success('Berhasil', 'Berhasil Hapus Metode');
        return redirect('/metode');
    }    
}