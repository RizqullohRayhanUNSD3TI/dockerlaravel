<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\detail_data;
use App\Models\Agama;

class User83Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index83()
    {
        $id = Auth::user()->id; 
        // $get = detail_data::where('user_id', $id)->get();
        // $cek = count($get);
        // if ($cek == 0) {
        //     detail_data::create([
        //         'user_id' => $id,
        //         'id_agama' => 0
        //     ]);
        // }
        // $data = detail_data::where('user_id', $id)->with('User', 'Agama')->first();
        $user = User::where('id',$id)->with(['detail_data' => function($query){
            $query->with('agama');
        }])->first();
        // dd($user);
        return view('user.profile', compact('user'));
    }

    public function add83(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $agama = Agama::all();
        return view('user.tambah', compact('agama', 'user'));
    }

    public function store83(Request $request)
    {
        $validatedData = $request->validate([
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'foto_ktp' => 'image|file|max:1024',
        ]);

        if ($request->file('foto_ktp')) {
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('ktp');
        }

        $lahir = $request->tanggal_lahir;
        $today = date("Y-m-d");
        $selisih = date_diff(date_create($lahir), date_create($today));
        $umur = $selisih->format('%y');

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['id_agama'] = $request->agama;
        $validatedData['umur'] = $umur;

        detail_data::create($validatedData);
        return redirect('/profile83')->with('success', 'Data Profil Berhasil diSimpan');
    }

    public function edit83()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->with(['detail_data' => function($query){
            $query->with('agama');
        }])->first();
        $agama = Agama::all();
        // dd($user);
        return view('user.edit', compact('agama', 'user'));
    }

    public function update83(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);
        
        $validatedData = $request->validate([
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'id_agama' => 'required',
            'foto_ktp' => 'image|file|max:1024',
        ]);

        if ($request->file('foto_ktp')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('ktp');
        }

        $lahir = $request->tanggal_lahir;
        $today = date("Y-m-d");
        $selisih = date_diff(date_create($lahir), date_create($today));
        $umur = $selisih->format('%y');
        $validatedData['umur'] = $umur;

        $id = Auth::user()->id;

        detail_data::where('user_id', $id)->update($validatedData);
        User::where('id', $id)->update($validatedUser);
        return redirect('/profile83')->with('success', 'Data Profil Berhasil diSimpan');
    }

    public function editFoto83()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('user.updateFoto', compact('user'));
    }

    public function storeFoto83(Request $request)
    {
        $id = Auth::user()->id;
        $validatedImage = $request->validate([
            'foto' => 'required|image|file|max:1024'
        ]);

        if ($request->oldImage != 'profil/defaultpropic.jpeg') {
            Storage::delete($request->oldImage);
        }
        $validatedImage['foto'] = $request->file('foto')->store('profile');

        User::where('id', $id)->update($validatedImage);
        return redirect('/profile83')->with('success', 'Data Profil Berhasil diSimpan');
    }

    public function editPassword83()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('user.editPassword', compact('user'));
    }

    public function updatePassword83(Request $request)
    {
        $request->validate([
            'passwordLama' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        if (Hash::check($request->passwordLama, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect('/profile83')->with('message', 'Password Berhasil di Ganti');
        }
        throw ValidationException::withMessages([
            'passwordLama' => 'Password lama Anda salah'
        ]);
    }
    
    public function destroyFoto83(Request $request)
    {
        Storage::delete($request->oldFoto);
        auth()->user()->update(['foto' => 'profile/defaultpropic.jpeg']);
        return redirect('/profile83');
    }
}
