<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Project();
        $data->contract_amount = $request->input('contract_amount');
        $data->contract_date = $request->input('contract_date');
        $data->state = $request->input('state');
        $data->start_date = $request->input('start_date');
        $data->end_date = $request->input('end_date');
        $data->status = $request->input('status');
        $data->save();
        $message = "Proje Kaydedildi.";
        return redirect()->route('project')->with('message', $message);
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
        $projectedit = Project::where('id', $id)->first();

        return view('project.edit', ['projectedit' => $projectedit]);
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
        $data = Project::find($id);
        $data->contract_amount = $request->input('contract_amount');
        $data->contract_date = $request->input('contract_date');
        $data->state = $request->input('state');
        $data->start_date = $request->input('start_date');
        $data->end_date = $request->input('end_date');
        $data->status = $request->input('status');
        $data->update($request->all());
        $data->save();

        return redirect()->route('project')
            ->with('success', 'Proje bilgileri başarıyla güncellendi.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return Redirect::back()->with('message', 'Proje bilgileri başarıyla silindi.'); //is this actually OK?;
    }
}
