<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;

class NilaiController extends Controller
{
    public function index(Request $request) 
    {
        $user_id = Auth::id();
        $role = Auth::user()->role;
        $magang = 'magang';
        $users = User::where('role', '!=', 'admin')->where('id', '=', $user_id)->get();

        if ($role == 'admin') {
                $data = User::where(function ($query) use ($magang){
                    $query->where('role', 'like', '%'.$magang.'%');
                })
                ->paginate(5);
            } else {
                $data = User::where(function ($query) use ($user_id){
                    $query->where('id', '=', $user_id);
                })
                
                ->paginate(5);
                if ($role !== 'admin') {
                    $data->where('user_id', '=', $user_id);
                }
            }
        
        return view('dashboard.nilai.index', [
            'title' => 'Nilai Akhir',
            'data' => $data
        ]);
        // $user_id = Auth::id();
        // $role = Auth::user()->role;
        // $magang = 'magang';
        // $search =  $request->input('q');
        // if($search!=""){
        //     $data = User::where(function ($query) use ($search){
        //         $query->where('name', 'like', '%'.$search.'%')
        //             ->orWhere('role', 'like', '%'.$search.'%');
        //     })
        //     ->paginate(10);
        //     $data->appends(['q' => $search]);
        // }
        // else{
        //     $data = User::where(function ($query) use ($magang){
        //         $query->where('role', 'like', '%'.$magang.'%');

        //     })
        //     ->paginate(10);
        // }
        // return view('dashboard.nilai.index', [
        //     'title' => 'Pengguna',
        //     'data' => $data
        // ]);
    }

    public function create()
    {
        $this->authorize('isAdmin');

        return view('dashboard.users.create',[
            'title' => 'Pengguna'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        
        $this->validate($request, [
            'NIM' => 'required|string',
            'jurusan' => 'required|string',
            'asal' => 'required|string',
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email|unique:users,email,',
            'nohp' => 'required|string'
        ]);

        $user = User::create([
            'NIM' => $request->NIM,
            'jurusan' => $request->jurusan,
            'asal' => $request->asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'nohp' => $request->nohp,
            'role' => 'magang'
        ]);

        if ($user) {
            return redirect()
                ->route('users.index')
                ->with([
                    'success' => 'Berhasil dibuat!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Oops!, something went wrong please try again!'
                ]);
        }
    }

    public function edit($id)
    {
        $this->authorize('isAdmin');
        $id = Crypt::decryptString($id);
        $row = User::findOrFail($id);

        return view('dashboard.nilai.edit',[
            'title' => 'Pengguna',
            'row' => $row
        ]);
    }

    public function show($id)
    {
        $this->authorize('isMagang');
        $id = Crypt::decryptString($id);
        $row = User::findOrFail($id);

        return view('dashboard.nilai.show',[
            'title' => 'Pengguna',
            'row' => $row
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('isAdmin');
        
        $id = Crypt::decryptString($id);
        $this->validate($request, [
            'NIM' => 'required|string',
            'jurusan' => 'required|string',
            'asal' => 'required|string',
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'nohp' => 'required|string'
        ]);

        $user = User::findOrFail($id);

        $data = [
            'NIM' => $request->NIM,
            'jurusan' => $request->jurusan,
            'asal' => $request->asal,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'role' => 'magang'
        ];

        if($request->password != "" || !empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        if ($user) {
            return redirect()
                ->route('users.index')
                ->with([
                    'success' => 'Berhasil diupdate!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Oops!, something went wrong please try again!'
                ]);
        }
    }

    public function destroy($id)
    {
        $id = Crypt::decryptString($id);
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('users.index')
                ->with([
                    'success' => 'Berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('users.index')
                ->with([
                    'error' => 'Oops!, something went wrong please try again!'
                ]);
        }
    }
}
