<?php

namespace App\Http\Controllers;

use App\Models\Departmant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('departmant')->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departmants = Departmant::all();
        $roles = Role::all();
        // dd($datalist);
        return view('user.create', ['departmants' => $departmants, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new User();
        $data->profile_photo_path = $request->input('profile_photo_path');
        $data->name = $request->input('name');
        $data->password = $request->input('password');
        $data->departmant_id = $request->input('departmant_id');
        $data->region = $request->input('region');
        $data->title = $request->input('title');
        $data->hourly_price = $request->input('hourly_price');
        $data->role_id = $request->input('role_id');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->address = $request->input('address');
        $data->save();
        $message = "Kullanıcı Kaydedildi.";
        return redirect()->route('user')->with('message', $message);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departmants = Departmant::all();
        $roles = Role::all();
        $datalist = User::where('id', $id)->first();

        return view('user.edit', ['departmants' => $departmants, 'roles' => $roles, 'datalist' => $datalist]);
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
        $data = User::find($id);
        $data->profile_photo_path = $request->input('profile_photo_path');
        $data->name = $request->input('name');
         $data->password = $request->input('password');
        $data->departmant_id = $request->input('departmant_id');
        $data->region = $request->input('region');
        $data->title = $request->input('title');
        $data->hourly_price = $request->input('hourly_price');
        $data->role_id = $request->input('role_id');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->address = $request->input('address');
        $data->update($request->all());
        $data->save();

        return redirect()->route('user')->with('success', 'Kullanıcı bilgileri başarıyla güncellendi.');
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
        $user->delete();

        return Redirect::back()->with('message', 'Kullanıcı bilgileri silindi.'); 
    }
}
