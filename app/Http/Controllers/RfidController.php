<?php

namespace App\Http\Controllers;
use App\Student;
use App\Fetcher;
use App\Logtrail;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::orderBy('id')->get();
        if($request->ajax()){
            return response()->json(['success' => true, 'students' => $students]);
       }
        return view('monitoring.index');
    }

    public function status($id)
    {
        $fetcher = Fetcher::where('name', $id)->update(request()->all());
    }

    public function students()
    {
        $students = Student::orderBy('id')->get();
        return response()->json(['success' => true, 'fetchers' => $students]);
    }
   
    public function get($id)
    {
        $fetcher = Fetcher::where("rfidno", $id)->select('id','name','status')->get();
        return response()->json(['success' => true, 'fetchers' => $fetcher]);
    }

    public function logtrail($id)
    {
        $student = Student::where("fetcher", $id)->select('firstname','lastname','gender','birthday',
        'grade','section','schoolyear','contact','fetcher','guardian','status','time')->get();
        return response()->json(['success' => true, 'students' => $student]);
    }

    public function insertlogtrail(Request $request)
    {
        $logtrail = Logtrail::create(request()->all());
    }

    public function update($id)
    {
        $students = Student::orderBy('id')->get();
        $student = Student::where('fetcher', $id)->update(request()->all());
        return view('monitoring.index',['students' => $students]);
    }

    public function destroy($id)
    {
        //
    }
}
