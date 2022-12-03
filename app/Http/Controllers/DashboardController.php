<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::user()->role == 2) {
            return view('dashboardPanel.dashboard', ['tickets' => Ticket::all()]);
        }else{
            return view('dashboardPanel.dashboard', ['tickets' =>auth()->user()->Ticket()->get()]);
        }

    }

    public function ticket(Ticket $ticket)
    {
        return view('dashboardPanel.ticket');

    }

    public function user()
    {
        return view('dashboardPanel.user', ['users' => User::all()]);

    }

    public function show($id)
    {      
        return view('dashboardPanel.showTicket', ['ticket' =>Ticket::find($id)]);

    }
}
