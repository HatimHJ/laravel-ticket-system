<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::user()->role == 2) {
            return view('dashboardPanel.dashboard', [
                'tickets' => Ticket::latest()->take(3)->get(),
                'users' => User::latest()->take(3)->get()
            ]);
        }else if(Auth::user()->role == 1){        
            return view('dashboardPanel.dashboard', ['tickets' =>Ticket::where('agent', Auth::user()->empNumber)->get()]);
        }else{
            return view('dashboardPanel.dashboard', ['tickets' =>auth()->user()->Ticket()->get()]);
        }

    }

    

    

}
