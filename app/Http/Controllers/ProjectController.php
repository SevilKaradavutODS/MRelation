<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\Work;
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
        // $projects = Project::all();
        $projects = Project::with('company')->get();
       
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Company::all();
        $works = Work::all();
       // dd($datalist);
        return view('project.create', ['datalist' => $datalist, 'works' => $works]);
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
        $data->company_id = $request->input('company_id');
        $data->work_id = $request->input('work_id');
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
        $datalist = Company::all();
        $works = Work::all();
        $projectedit = Project::where('id', $id)->first();

        return view('project.edit', ['datalist' => $datalist, 'works' => $works, 'projectedit' => $projectedit]);
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
        $data->company_id = $request->input('company_id');
        $data->work_id = $request->input('work_id');
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
