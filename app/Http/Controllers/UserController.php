<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use DB;
use App\User;
use Redirect;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware(['verified', 'admin']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::paginate(10);

        return view('user.index', compact('users'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::findOrFail($id);

        $profile = $user->profile;

        return view('user.show', compact('user', 'profile'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->updateUser($user, $request);

        //function_alert("You have updated a user");

        return Redirect::route('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        User::destroy($id);

        //function_alert("You have deleted a user");

        return Redirect::route('user.index');
    }
}