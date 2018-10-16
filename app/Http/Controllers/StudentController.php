<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Grade;
use App\Fetcher;
use App\Section;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id')->get();
        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        $fetchers = Fetcher::orderBy('id')->get();
        $grades = Grade::orderBy('id')->get();
        $sections = Section::orderBy('id')->get();
        return view('students/create', ['fetchers' => $fetchers,'grades'=>$grades,'sections'=>$sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = $request->all();
        $data = $request->validate([
           'firstname' => 'required',
           'lastname' => 'required',
           'gender' => 'required',
           'birthday' => 'required',
           'grade' => 'required',
           'section' => 'required',
           'schoolyear' => 'required',
           'contact' => 'required',
           'fetcher' => 'required',
           'guardian' => 'required',
       ]);
       Student::create($data);
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
        $student = Student::find($id);
        $fetchers = Fetcher::find($id);
        $grades = Grade::find($id);
        $sections = Section::find($id);
        $fetchers = DB::table('fetchers')->get();
        $grades = DB::table('grades')->get();
        $sections = DB::table('sections')->get();
        
        return view('students/edit', ['student' => $student,'fetchers' => $fetchers,'grades'=>$grades,'section'=>$sections]);
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
        $student = Student::find($id);
        $data = $request->all();
        $student->update($data);

        return redirect('student')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
	    $student->delete($id);

	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
