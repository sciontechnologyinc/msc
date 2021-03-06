<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Fetcher;
use App\Deparment;
use App\Grade;
use App\Teacher;
use App\User;
use App\Logtrail;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Show Dashboard View
     *
     * @return View
     */
    public function index(){
        $t_students = Student::all()->count();
        $t_teachers = User::all()->where("admin","0")->count();
        $t_fetchers = Fetcher::all()->count();
        $t_users = User::all()->count();
        $logtrails = Logtrail::orderBy('id')->get();

        return view('dashboard.index',['logtrails' => $logtrails])
            ->with([
                't_students'             =>  $t_students,
                't_teachers'        =>  $t_teachers,
                't_fetchers'        =>  $t_fetchers,
                't_users'             =>  $t_users,
            ]);
    }

    public function logtrail(){
        $logtrails = Logtrail::orderBy('id')->get();
        return response()->json(['logtrails' => $logtrails]);
    }
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}
