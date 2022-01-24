<?php

namespace App\Http\Controllers;

use App\Prodmast;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProdmastController extends Controller
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

        if(request()->ajax())
        {
            if(!empty($request->filter_branch))
            {
                $nilai = DB::connection('mysql_2')
                ->table("log_update_prodmasts")
                ->join('branches','log_update_prodmasts.branch_id','=','branches.id')
                ->join('tmi_types','log_update_prodmasts.tmi_type_id','=','tmi_types.id')
                ->orderBy('date', 'desc')
                ->select(
                'log_update_prodmasts.tmi_type_id',
                'log_update_prodmasts.date',
                'log_update_prodmasts.status',
                'branches.code',
                'branches.name',
                'tmi_types.code as cd',
                'tmi_types.description'
                )
                ->where('branches.name', $request->filter_branch)
                ->where('tmi_types.description',$request->filter_type)
                ->whereBetween('log_update_prodmasts.date', array($request->from_date, $request->to_date))
                ->orderBy('date', 'desc')
                ->limit(100)
                ->get();
            }
            else
            {
                $nilai = DB::connection('mysql_2')
                ->table("log_update_prodmasts")
                ->join('branches','log_update_prodmasts.branch_id','=','branches.id')
                ->join('tmi_types','log_update_prodmasts.tmi_type_id','=','tmi_types.id')
              //  ->orderBy('date', 'desc')
                ->select(
                'log_update_prodmasts.tmi_type_id',
                'log_update_prodmasts.date',
                'log_update_prodmasts.status',
                'branches.code',
                'branches.name',
                'tmi_types.code as cd',
                'tmi_types.description'
                )
                ->limit(100)
                ->get();
            }
            return datatables()->of($nilai)
            ->make(true);
        }

        $cabang = DB::connection('mysql_2')
        ->table("branches")
        ->select("*")
        ->get();

        $tipe = DB::connection('mysql_2')
        ->table("tmi_types")
        ->select("*")
        ->get();

        return view ('prodmast.prodmast', compact ('cabang','tipe'));

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
     * @param  \App\Prodmast  $prodmast
     * @return \Illuminate\Http\Response
     */
    public function show(Prodmast $prodmast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prodmast  $prodmast
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodmast $prodmast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prodmast  $prodmast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodmast $prodmast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prodmast  $prodmast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodmast $prodmast)
    {
        //
    }
}
