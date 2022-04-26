<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile= Profile::where('users_id',Auth::id())->first();

        return view('profile.index', compact('profile'));
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
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        $profile = Profile::find($id);

        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        
        $profile->update();

        return redirect('/profile');
    }
}

