<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkController extends Controller
{

    protected $appends = ['getParentsTree'];

    public static function getParentsTree($category, $title){
        if($category->parent_id == 0){
            return $title;
        }

        $parent = Work::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$works = Work::all();
        $works = Work::with( relations: 'children')->get();
       return view('work.index', ['works' => $works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Work();
        $data->type = $request->input('type');
        $data->name = $request->input('name');
        $data->status = $request->input('status');
        $data->save();
        $message = "İş Kaydedildi.";
        return redirect()->route('work')->with('message', $message);
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
        $workedit = Work::where('id', $id)->first();

        return view('work.edit', ['workedit' => $workedit]);
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
        $data = Work::find($id);
        $data->name = $request->input('type');
        $data->name = $request->input('name');
        $data->name = $request->input('status');
        $data->update($request->all());
        $data->save();

        return redirect()->route('work')
            ->with('success', 'İş bilgileri başarıyla güncellendi.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $works = Work::find($id);
        $works->delete();

        return Redirect::back()->with('message', 'İş bilgileri başarıyla silindi.'); //is this actually OK?;
    }
}
