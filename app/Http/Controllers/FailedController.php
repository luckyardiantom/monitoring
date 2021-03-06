<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Failed;
use Illuminate\Http\Request;

class FailedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //

        if(request()->ajax())
        {
            if(!empty($request->filter_branch))
            {
                $nilai = DB::connection('mysql_2')
                ->table("failed_jobs")
                ->select(
                    'failed_jobs.queue',
                    'failed_jobs.payload',
                    'failed_jobs.exception',
                    'failed_jobs.failed_at'
                    )
              //  ->where('failed_jobs.queue', $request->filter_branch)
                ->limit(100)
                ->get();
            }
            else
            {
                $nilai = DB::connection('mysql_2')
                ->table("failed_jobs")
                ->select(
                    'failed_jobs.queue',
                    'failed_jobs.payload',
                    'failed_jobs.exception',
                    'failed_jobs.failed_at'
                    )
                ->limit(100)
                ->get();
            }
            return datatables()->of($nilai)->make(true);
        }


        return view ('failed.failed');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
