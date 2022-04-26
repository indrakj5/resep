<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Komentar;

class KomentarController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required',
            'like' => 'required'
        ]);

        $komentar = new Komentar;

        $komentar->komentar = $request->komentar;
        $komentar->users_id = Auth::id();
        $komentar->resep_id = $request->resep_id;
        $komentar->like = $request->like;
        
        $komentar->save();
        
        return redirect()->back();
    }
}
