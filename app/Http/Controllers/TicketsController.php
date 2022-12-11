<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if agent return to dashboard else [user|admin] show create ticket form
        if (Auth::user()->role != '1') {
            return view('dashboardPanel.createTicket');
        }
        return redirect('/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {    
            $slug = Str::slug($request->title, '-');
            $imageName = uniqid() . $slug . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            Ticket::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'image' => $imageName,
            ]);
        }
        return redirect('/dashboard')->with('ticketCreated', 'Ticket Created Successfully..');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        $ticket = Ticket::find($id);
        if (User::where('role', '2')->first() == $user ||
            $ticket->agent == $user->empNumber ||
            $ticket->user_id == $user->id
            ) {
                return view('dashboardPanel.showTicket', 
                ['ticket' => $ticket,
                'user' => User::where('id', $ticket->user_id)->first()
            ]);
            }else{
                return redirect('/dashboard');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('dashboardPanel.editTicket', [
            'ticket' => Ticket::find($id),
            'agents'  => User::where('role', '1')->get()
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
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        // handle image 
        if ($request->hasFile('image')) {
            $slug = Str::slug($request->title, '-');
            $imageName = uniqid() . $slug . '.' .  $request->image->extension();
            $request->image->move(public_path('images'), $imageName);            
            Ticket::where('id', $id)->update([
                    'title'       => $request->title,
                    'description' => $request->description,
                    'image'       => $imageName? $imageName:null,
                    'agent'       => $request->agent,
                    'status'      => $request->status,
                    'priority'    => $request->priority
                ]);
        }
        return redirect('ticket/'.$id)->with('msg', 'ticket updated...');
    }

    // mark ticket as completed [close ticket]
    public function closeTicket(Request $request, $id)
    {
        Ticket::where('id', $id)->update(['status' => 'closed']);
        return redirect('ticket/'.$id)
        ->with('msg', 'ticket closed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
