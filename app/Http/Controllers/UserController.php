<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->id() == 1)
        {
            $users = User::paginate(5);
            return view('users.index', compact('users'));
        }
        else
        {
            return redirect('/home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.changepw', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        if($request->has('active'))
        {
            $msg = $request->input('active') == 1 ? 'activated' : 'deactivated';
            $user->update($request->all());
            return redirect('users')->withStatus(__('User successfully '.$msg.' !'));
        }
        elseif($request->has('current_password'))
        {
             $this->validate($request, [
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            if(Hash::check($request->current_password, $user->password))
            {
                $user->update(
                    $request->merge(['password' => Hash::make($request->get('password'))])
                        ->except(['password_confirmation']          
                ));

                return back()->withStatus(__('Password successfully changed'));

            }
            else
            {
                return back()->withStatus(__('Current password incorrect'));
            }

        }
        else
        {         
            return redirect('users')->withStatus(__('User password reset successfully to "password"'));
        }
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }
}
