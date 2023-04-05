<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:20|confirmed',
            "password_confirmation" => "required|min:6|max:20"
        ]);

        $user = new User;
     
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        // Check the user's role and redirect to the appropriate route
        if ($user->role !== null) {
            if ($user->role->name === 'admin') {
                return redirect(route('admin.dashboard'));
            } 
        }

        // Log in the user
        Auth::login($user);
        
        // Redirect the user without a role to a default route
        return redirect(route('etudiant.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    
    public function userList(){
        $users = user::select('id','name','email')->paginate(5);
        return view('auth.user-list', ['users' => $users]);
    }

    public function authentication(Request $request){
        // dd(Auth::user());
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(!Auth::validate($credentials)):
            return redirect()->back()->withErrors(trans('auth.password'))->withInput();
        endif;
       
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
     
        Auth::login($user);

        $role = auth()->user()->role;

        // Check the user's role and redirect to the appropriate route

        if ($role !== null) {
            if ($role->name === 'admin') {
                // The user is an admin
                return redirect()->intended(route('admin.home'));
            } elseif ($role->name === 'student') {
                // The user is a student
                return redirect()->intended(route('home'));
            }
        } else {
            return redirect()->intended(route('etudiant.create'));
        }

    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

}