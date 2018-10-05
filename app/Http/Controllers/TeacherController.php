<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Department;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::orderBy('id')->get();
        return view('teachers.index', ['teachers' => $teachers]);
    }
    public function dropdown()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::orderBy('id')->get();
        $sections = Section::orderBy('id')->get();
        return view('teachers/create', ['departments' => $departments, 'sections' => $sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {

        $request->merge([ 
            'section' => implode(', ', (array) $request->get('section'))
        ]);
    

        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'department' => $data['department'],
            'section' => $data['section'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'password' => Hash::make($data['password']),

           
       ]);

       $user = new User;
       $user->name = $request->input('name');
       $user->lastname = $request->input('lastname');
       $user->email = $request->input('email');
       $user->gender = $request->input('gender');
       $user->birthday = $request->input('birthday');
       $user->department = $request->input('department');
       $user->section = $request->input('section');
       $user->address = $request->input('address');
       $user->contact = $request->input('contact');
       $user->password = $request->input('password');
       $user->section = implode(', ', (array) $request->get('section'));

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
        $departments = DB::table('departments')->get();
        $sections = DB::table('sections')->get();
        $teacher = User::find($id);
        return view('teachers/edit', ['teacher' => $teacher, 'departments' => $departments ,'sections' => $sections]);
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
        $teacher = User::find($id);
        $data = $request->all();
        $teacher->update($data);

        return redirect('teacher')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = User::find($id);
	    $teacher->destroy($id);

	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
