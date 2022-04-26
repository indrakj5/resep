<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Resep;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class ResepController extends Controller
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
        $resep = Resep::all();

        return view('resep.index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $metode = DB::table('metode')->get();
        return view('resep.create', compact('kategori','metode'));
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
            'judul' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'metode_id' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $thumbnailName = time().'.'.$request->thumbnail->extension();

        $request->thumbnail->move(public_path('images'), $thumbnailName);

        $resep = new Resep;

        $resep->judul = $request->judul;
        $resep->content = $request->content;
        $resep->kategori_id = $request->kategori_id;
        $resep->metode_id = $request->metode_id;
        $resep->thumbnail = $thumbnailName;
      
        $resep->save();

        Alert::success('Berhasil', 'Berhasil Tambah Resep');
        return redirect('/resep');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resep = Resep::findOrFail($id);

        return view('resep.show', compact('resep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = DB::table('kategori')->get();
        $metode = DB::table('metode')->get();
        $resep = Resep::findOrFail($id);

        return view('resep.edit', compact('resep', 'kategori', 'metode'));
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
            'judul' => 'required',
            'content' => 'required',
            'kategori_id' => 'required',
            'metode_id' => 'required',
        ]);

        $resep = Resep::find($id);

        if($request->has('thumbnail')){
            $thumbnailName = time().'.'.$request->thumbnail->extension();

            $request->thumbnail->move(public_path('images'), $thumbnailName);

            $resep->judul = $request->judul;
            $resep->content = $request->content;
            $resep->kategori_id = $request->kategori_id;
            $resep->metode_id = $request->metode_id;
            $resep->thumbnail = $thumbnailName;
        }else{
            $resep->judul = $request->judul;
            $resep->content = $request->content;
            $resep->kategori_id = $request->kategori_id;
            $resep->metode_id = $request->metode_id;
        }

        $resep->update();

        Alert::success('Berhasil', 'Berhasil Update Resep');
        return redirect('/resep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resep = Resep::find($id);

        $path = "images/";
        File::delete($path . $resep->thumbnail);
        $resep->delete();

        return redirect('/resep');
    }
}
