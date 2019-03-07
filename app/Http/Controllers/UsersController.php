<?php

namespace App\Http\Controllers;

use App\PoliceRank;
use App\Profile;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:user-list');
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-view', ['only' => ['show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $ranks = PoliceRank::all();

        return view('users.index', compact('users', 'ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();
        $ranks = PoliceRank::all();

        return view('users.create', compact('roles', 'ranks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required|max:50',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|numeric|min:10',
            'password' => 'required',
            'avatar' => 'required|image',
            'roles' => 'required',
            'rank' => 'required',
            'badge' => 'required',
        ]);

        $featured = $request->avatar;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/avatars', $featured_new_name);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->input('roles'));

        Profile::create([
            'user_id' => $user->id,
            'phone_number' => $request->phone_number,
            'full_name' => $request->full_name,
            'avatar' => 'uploads/avatars/'.$featured_new_name,
            'rank_id' => $request->rank,
            'badge_number' => $request->badge
        ]);

        notify()->success('User successfully created');

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);

        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('name','name')->all();
        $ranks = PoliceRank::all();

        return view('users.edit', compact('user', 'roles', 'userRole', 'ranks'));

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

        $this->validate($request, [
            'full_name' => 'required|max:70',
            'username' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|min:10',
            'roles' => 'required',
            'rank' => 'required',
            'badge' => 'required'

        ]);

        $user = User::find($id);

        if($request->hasFile('avatar')) {

            $featured = $request->avatar;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/avatars', $featured_new_name);

            $user->profile->avatar = 'uploads/avatars/'.$featured_new_name;

        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->profile->full_name = $request->full_name;
        $user->profile->phone_number = $request->phone_number;
        $user->profile->rank_id = $request->rank;
        $user->profile->badge_number = $request->badge;

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        $user->save();
        $user->profile->save();

        if($request->has('new_password')) {
            $user->password = Hash::make($request->new_password);
            $user->save();
        }

        notify()->success('The User was updated');

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        notify()->success('User deleted');

        return redirect()->back();
    }

    public function profile()
    {

        $set = User::find(Auth::id());
//        $rank = ;

        return view('users.profile', compact('set'));

    }


}
