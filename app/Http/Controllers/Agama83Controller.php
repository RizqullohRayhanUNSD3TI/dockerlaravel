<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Agama;
use App\Models\detail_data;

class Agama83Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index83()
    {
        $agama = Agama::all();
        return view('admin.listAgama', compact('agama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create83()
    {
        return view('admin.addAgama');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store83(Request $request)
    { 
        // dd($request->agama);
        $this->validate($request,[
            'agama' => 'required',
        ]);

        $agama = $request->old('agama');

        $addAgama = Agama::create([
            'nama_agama' => $request->agama,
        ]);
        return redirect('/tambahAgama83');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show83($id)
    {
        $user = detail_data::where('id_agama', Crypt::decryptString($id))->get();
        $penganut = count($user);
        $agama = Agama::find(Crypt::decryptString($id));
        return view('admin.detailAgama', compact('agama', 'penganut'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit83($id)
    {
        $agama = Agama::find(Crypt::decryptString($id));
        return view('admin.editAgama', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update83(Request $request, $id)
    {
        $this->validate($request, [
            'agama' => 'required'
        ]);
        
        $agama = $request->old('agama');

        Agama::where('id', $id)->update([
            'nama_agama' => $request->agama
        ]);

        return redirect('/agama83');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy83($id)
    {
        Agama::where('id', Crypt::decryptString($id))->delete();
        return redirect('/agama83');
    }
}
