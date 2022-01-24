<?php

namespace App\Http\Controllers;

use App\Margin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;


class MarginController extends Controller
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
                $nilai = DB::table('master_margin')

->join('divisi','master_margin.div','=','divisi.DIV_KODEDIVISI')
->join('department','master_margin.dep','=','department.DEP_KODEDEPARTEMENT')
->join('category','master_margin.kat','=','category.KAT_KODEKATEGORI')
->join('tipe_tmi','master_margin.kode_tmi','=','tipe_tmi.kode_tmi')
->join('branches','master_margin.kode_igr','=','branches.kode_igr')

                ->select(
                'category.KAT_NAMAKATEGORI',
                'branches.kode_igr',
                'tipe_tmi.kode_tmi',
                'master_margin.margin_min',
                'master_margin.margin_saran',
                'department.DEP_NAMADEPARTEMENT',
                'master_margin.margin_max',
                'divisi.DIV_NAMADIVISI'
                )
                ->where('branches.kode_igr', $request->filter_branch)
                ->where('tipe_tmi.kode_tmi',$request->filter_type)
                ->limit(100)
                ->get();
            }
            else
            {
                $nilai = DB::table('master_margin')
                ->join('divisi','master_margin.div','=','divisi.DIV_KODEDIVISI')
                ->join('department','master_margin.dep','=','department.DEP_KODEDEPARTEMENT')
                ->join('category','master_margin.kat','=','category.KAT_KODEKATEGORI')
                ->join('tipe_tmi','master_margin.kode_tmi','=','tipe_tmi.kode_tmi')
                ->join('branches','master_margin.kode_igr','=','branches.kode_igr')

                ->select(
                'category.KAT_NAMAKATEGORI',
                'branches.kode_igr',
                'tipe_tmi.kode_tmi',
                'master_margin.margin_min',
                'department.DEP_NAMADEPARTEMENT',
                'divisi.DIV_NAMADIVISI',
                'master_margin.margin_saran',
                'master_margin.margin_max'
                )
               ->limit(100)
                ->get();
            }
            return datatables()->of($nilai)->make(true);
        }

        $cabang =DB::table('branches')
        ->select("*")
        ->get();

        $tmi =DB::table('tipe_tmi')
        ->select("*")
        ->get();

        return view ('margin.margin', compact ('cabang','tmi'));

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
     * @param  \App\Margin  $margin
     * @return \Illuminate\Http\Response
     */
    public function show(Margin $margin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Margin  $margin
     * @return \Illuminate\Http\Response
     */
    public function edit(Margin $margin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Margin  $margin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Margin $margin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Margin  $margin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Margin $margin)
    {
        //
    }
}
