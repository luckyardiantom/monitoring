<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
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
                ->table("pb_headers")
                ->join('log_send_pbs','log_send_pbs.pb_header_id','=','pb_headers.id')
                ->select(
                    'pb_headers.name',
                    'pb_headers.email',
                    'pb_headers.address',
                    'pb_headers.po_date',
                    'pb_headers.flag_sent',
                    'pb_headers.po_number',
                    'log_send_pbs.pb_header_id',
                    'log_send_pbs.updated_at'
                    )
             //   ->limit(100)

             ->orderBy('log_send_pbs.updated_at', 'desc')
           // ->groupBy('pb_header_id')
                ->get();
            }
            else
            {
                $nilai = DB::connection('mysql_2')
                ->table("pb_headers")
                ->join('log_send_pbs','log_send_pbs.pb_header_id','=','pb_headers.id')
                ->select(
                    'pb_headers.name',
                    'pb_headers.email',
                    'pb_headers.address',
                    'pb_headers.po_date',
                    'pb_headers.flag_sent',
                    'pb_headers.po_number',
                    'log_send_pbs.pb_header_id',
                    'log_send_pbs.updated_at'
                    )

                    ->orderBy('log_send_pbs.updated_at', 'desc')
                  //  ->groupBy('pb_header_id')
                    ->get();
            }
            return datatables()->of($nilai)->make(true);
        }


        return view ('permintaan.permintaan');


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
     * @param  \App\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function show(Permintaan $permintaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permintaan $permintaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permintaan $permintaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permintaan $permintaan)
    {
        //
    }
}
