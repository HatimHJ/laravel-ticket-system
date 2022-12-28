<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{

    public function index()
    {
        return view('dashboardPanel.user.index', ['users' => User::all()]);
    }

    public function show($id)
    {
        return view('dashboardPanel.user.show', ['user' => User::find($id)]);
    }

    public function edit($id)
    {
        //
        return view('dashboardPanel.user.edit', [
            'user' => User::find($id)
        ]);
    } 

    public function create(){
        return view('dashboardPanel.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'empNumber' => ['required'],
            'role' => ['required'],
            'email' => ['required','string', 'email', 'max:255', 'unique:'.User::class ],
            'phone' => ['string', 'max:10'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
        ]);
        $formFields = [
            'name' => $request->name,
            'empNumber' => $request->empNumber,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($formFields);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'empNumber' => ['required'],
            'email' => ['string', 'email', 'max:255', ],
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
        return redirect('/dashboard/user')->with('msg', 'user changed...');
    }

    public function destroy($id){
        User::where('id', $id)->delete();
        return redirect('/dashboard/user')->with('msg', 'user changed...');
    }
}
