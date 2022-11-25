<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request) 
    {
        $role = Auth::user()->role;
        $magang = 'magang';
        if($role == 'admin'){
            $data = User::where(function ($query) use ($magang){
                $query->where('role', 'like', '%'.$magang.'%');
            })
            ->paginate(10);
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'data' => $data
            ]);
        }else{
            return view('dashboard.index', [
                'title' => 'Dashboard'
            ]);
        }

    }

}
