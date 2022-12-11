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
            return view('dashboardPanel.dashboard', ['tickets' => Ticket::all()]);
        }else if(Auth::user()->role == 1){        
            return view('dashboardPanel.dashboard', ['tickets' =>Ticket::where('agent', Auth::user()->empNumber)->get()]);
        }else{
            return view('dashboardPanel.dashboard', ['tickets' =>auth()->user()->Ticket()->get()]);
        }

    }

    
    // user
    public function user()
    {
        return view('dashboardPanel.user', ['users' => User::all()]);
    }

    public function showUser($id)
    {
        return view('dashboardPanel.showUser', ['user' => User::find($id)]);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'empNumber' => ['required'],
            'email' => ['string', 'email', 'max:255', ],
            'role' => ['required'],
            'phone' => ['string', 'max:10'],
        ]);
        $formFields = [
            'name' => $request->name,
            'empNumber' => $request->empNumber,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
        ];

        User::where('id', $id)->update($formFields);
        return redirect('/user')->with('msg', 'user changed...');
    }

}
