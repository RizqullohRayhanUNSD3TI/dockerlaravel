<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Agama;
use App\Models\detail_data;

class Admin83Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function indexAdmin83()
    {
        $dataUser = detail_data::with(['User' => function($query)
        {
            $query -> where('is_aktif', '1');
        }])->with('Agama')->get();
        // $user = User::all();
        // dd($dataUser);
        return view('admin.listData', compact('dataUser'));
    }
    
    public function approve83()
    {
        $dataUser = User::where('is_aktif', '0')->latest()->get();
        // dd($dataUser);
        return view('admin.verUser', compact('dataUser'));
    }

    public function prosesApprove83($id)
    {
        $approve = User::where('id', $id)->update(['is_aktif' => '1']);
        // dd($approve);
        return redirect('/verifikasiUser83');
    }

    public function detailUser83($id)
    {
        $user = detail_data::find(Crypt::decryptString($id));
        $user->with('User', 'Agama')->get();
        return view('admin.detailUser', compact('user'));
    }
}
