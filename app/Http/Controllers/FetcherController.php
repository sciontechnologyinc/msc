<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fetcher;
use App\Grade;
use DB;
class FetcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchers = Fetcher::orderBy('id')->get();

        $trashfetchers = DB::table('fetchers')
        ->whereNotNull('deleted_at')
        ->get();
   
        return view('fetchers.index', ['fetchers' => $fetchers,'trashfetchers'=>$trashfetchers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fetchers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fetcher = $request->all();
        $data = $request->validate([
           'name' => 'required',
           'gender' => 'required',
           'birthday' => 'required',
           'rfidno' => 'required',
           'address' => 'required',
           'contact' => 'required',
       ]);
       Fetcher::create($data);
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
        $fetcher = Fetcher::find($id);
        return view('fetchers/edit', ['fetcher' => $fetcher]);
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
        $fetcher = Fetcher::find($id);
        $data = $request->all();
        $fetcher->update($data);

        return redirect('fetcher')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fetcher = Fetcher::find($id);
	    $fetcher->delete($id);

	    return redirect()->back()->with('success','Deleted successfuly');
    }
}
