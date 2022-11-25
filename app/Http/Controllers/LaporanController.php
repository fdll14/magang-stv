<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $role = Auth::user()->role;

        $users = User::where('role', '!=', 'admin')->where('id', '=', $user_id)->get();

        $search =  $request->input('q');
        if ($search != "") {
            $data = Laporan::distinct()
                ->join('users', 'users.id', '=', 'laporans.user_id')
                ->select('laporans.id', 'user_id', 'tgl_laporan', 'laporan', 'status', 'name')
                ->groupBy('laporans.id', 'user_id', 'tgl_laporan', 'laporan', 'status', 'name')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhere('tgl_laporan', 'like', '%' . $search . '%')
                        ->orWhere('laporan', 'like', '%' . $search . '%');;
                })
                ->paginate(5);
            if ($role !== 'admin') {
                $data->where('user_id', '=', $user_id);
            }
            $data->appends(['q' => $search]);
        } else {
            if ($role == 'admin') {
                $data = Laporan::distinct()
                    ->join('users', 'users.id', '=', 'laporans.user_id')
                    ->select('laporans.id', 'name', 'laporan', 'tgl_laporan', 'status')
                    ->groupBy('laporans.id', 'name', 'laporan', 'tgl_laporan', 'status')
                    ->paginate(5);
            } else {
                $data = Laporan::distinct()
                    ->join('users', 'users.id', '=', 'laporans.user_id')
                    ->select('laporans.id', 'name', 'laporan', 'tgl_laporan', 'status')
                    ->where('user_id', '=', $user_id)
                    ->groupBy('laporans.id', 'name', 'laporan', 'tgl_laporan', 'status')
                    ->paginate(5);
                if ($role !== 'admin') {
                    $data->where('user_id', '=', $user_id);
                }
            }
        }
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isMagang');
        $user_id = auth()->user()->id;
        $users = User::where('id', '=', $user_id)->get();

        return view('dashboard.laporan.create', [
            'title' => 'Laporan',
            'row' => array(
                'id' => uniqid()
            ),
            'users' => $users
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
        $this->authorize('isMagang');
        $user_id = Auth::id();

        $request->validate([
            'laporan' => 'required',
            'tgl_laporan' => 'required|date'
        ]);

        $request->merge(['user_id' => $user_id]);

        Laporan::create($request->only('user_id', 'laporan', 'tgl_laporan'));

        return redirect()->route('laporan.index')->with('success', 'Berhasil menambahkan laporan baru.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('isAdmin');
        $id = Crypt::decryptString($id);
        $row = Laporan::where('id', '=', $id)
            ->firstOrFail();
        $users = User::where('role', '!=', 'admin')->get();

        return view('dashboard.laporan.edit', [
            'title' => 'Laporan',
            'row' => $row,
            'users' => $users
        ]);
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
        $this->authorize('isAdmin');
        $user_id = Auth::id();

        $request->validate([
            'status' => 'required'
        ]);

        $request->merge(['user_id' => $user_id]);

        $data = Laporan::findOrFail($id);
        $data->update($request->only('status'));

        return redirect()->route('laporan.index')->with('success', 'Berhasil update laporan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $id = Crypt::decryptString($id);
        $Laporan = Laporan::where('id', '=', $id);
        $Laporan->delete();

        if ($Laporan) {
            return redirect()
                ->route('laporan.index')
                ->with([
                    'success' => 'Berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('laporan.index')
                ->with([
                    'error' => 'Oops!, something went wrong please try again!'
                ]);
        }
    }
}
