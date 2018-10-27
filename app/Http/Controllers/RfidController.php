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
            return response()->json(['students' => $students]);
       }
        return view('monitoring.index');
    }

    public function status($id)
    {
        $fetcher = Fetcher::where('name', $id)->update(request()->all());
    }
    public function todayfetcher($id)
    {
        $todayfetcher = Student::where('fetcher', $id)
                             ->orWhere('guardian', $id)
                             ->orWhere('guardian1', $id)
                             ->orWhere('guardian2', $id)
                             ->update(request()->all());
       
    }

    public function attendance($id,$name)
    {
            $student = Student::find($id);
            $student->attendance = $name;
            $student->save();
    }
    
    public function students($id)
    {
        $students = Student::where("section",$id)->where("attendance","Present")->orderBy('id')->get();
        return response()->json(['fetchers' => $students]);
    }
    public function attendanceDisplay($id)
    {
        $students = Student::where("section",$id)->orderBy('id')->get();
        return response()->json(['fetchers' => $students]);
    }
   
    public function get($id)
    {
        $fetcher = Fetcher::where("rfidno", $id)->select('id','name','status','type')->get();
        return response()->json(['fetchers' => $fetcher]);
    }

    public function logtrail($id)
    {
        $student = Student::where("fetcher", $id)->orWhere("guardian", $id)
        ->orWhere("guardian1", $id)->orWhere("guardian2", $id)->select('firstname','lastname','gender','birthday',
        'grade','section','schoolyear','contact','fetcher','guardian','status','time','todayfetcher')->get();
        return response()->json(['students' => $student]);
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
