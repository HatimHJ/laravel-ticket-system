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

    // ticket
    public function show($id)
    {      
        $user = Auth::user();
        $ticket = Ticket::find($id);
        if (User::where('role', '2')->first() == $user ||
            $ticket->agent == $user->empNumber ||
            $ticket->user_id == $user->id
            ) {
                return view('dashboardPanel.showTicket', ['ticket' => $ticket]);
            }else{
                return redirect('/dashboard');
            }

    }

    // public function ticket(Ticket $ticket)
    // {
    //     return view('dashboardPanel.ticket');
    // }

    public function createTicket()
    {
        return view('dashboardPanel.createTicket');
    }

    public function storeTicket(Request $request)
    {
        dd($request);
    }

    public function updateTicket(Request $request, $id)
    {
        Ticket::where('id', $id)->update(['status' => 'closed']);
        return redirect('ticket/'.$id)
        ->with('msg', 'ticket closed');
    }

    public function manageTicket(Request $request, $id)
    {
        return view('dashboardPanel.editTicket', [
            'ticket' => Ticket::find($id),
            'agents'  => User::where('role', '1')->get()
        ]);
    }

    public function editTicket(Request $request, $id)
    {
        Ticket::where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'agent'       => $request->agent,
            'status'      => $request->status,
            'priority'    => $request->priority
        ]);
        return redirect('ticket/'.$id)->with('msg', 'ticket updated...');
    }



}
