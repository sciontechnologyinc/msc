<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Grade;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderBy('id')->get();
        return view('sections.index', ['sections' => $sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sectioncheckbox()
    {
	    $sections = Section::orderBy('id')->get();
        return view('teachers/create', ['sections' => $sections]);
    }

    public function create()
    {
        $grades = Grade::orderBy('id')->get();
        return view('sections.create',['grades'=>$grades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = $request->all();
        $data = $request->validate([
           'grade' => 'required',
           'section' => 'required'
       ]);
       Section::create($data);
       return redirect()->back()->with('success','Added successfuly');

       
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
        $section = Section::find($id);
        $grades = Grade::orderBy('id')->get();
        return view('sections/edit', ['section' => $section,'grades'=>$grades]);
    }
    
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        $data = $request->all();
        $section->update($data);

        return redirect('section')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
	    $section->destroy($id);

	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
