<?php

namespace App\Http\Controllers;

use App\Models\Departmant;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $departmants = Departmant::all();
        $departmants = Departmant::with('users')->get();
        $users = User::all();
       // dd($departmants);
       return view('departmant.index', ['departmants' => $departmants, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departmant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Departmant();
        $data->name = $request->input('name');
        $data->save();
        $message = "Department Kaydedildi.";
        return redirect()->route('departmant')->with('message', $message);
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
        $departmantedit = Departmant::where('id', $id)->first();

        return view('departmant.edit', ['departmantedit' => $departmantedit]);
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
        $data = Departmant::find($id);
        $data->name = $request->input('name');
        $data->update($request->all());
        $data->save();

        return redirect()->route('departmant')
            ->with('success', 'Department bilgileri başarıyla güncellendi.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departmant = Departmant::find($id);
        $departmant->delete();

        return Redirect::back()->with('message', 'Department bilgileri başarıyla silindi.'); //is this actually OK?;
    }
}
