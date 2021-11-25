<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('company.index', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Company();
        $data->name = $request->input('name');
        $data->city = $request->input('city');
        $data->country = $request->input('country');
        $data->keyword = $request->input('keyword');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->save();
        $message = "Firma Kaydedildi.";
        return redirect()->route('company')->with('message', $message);
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
        $companyedit = Company::where('id', $id)->first();

        return view('company.edit', ['companyedit' => $companyedit]);
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
        $data = Company::find($id);
        $data->name = $request->input('name');
        $data->city = $request->input('city');
        $data->country = $request->input('country');
        $data->keyword = $request->input('keyword');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->update($request->all());
        $data->save();

        return redirect()->route('company')
            ->with('success', 'Firma bilgileri başarıyla güncellendi.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return Redirect::back()->with('message', 'Firma bilgileri başarıyla silindi.'); //is this actually OK?;
    }
}
