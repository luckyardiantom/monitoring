<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\Request;

class ProdukController extends Controller
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
                $nilai = DB::table('master_plu')
                ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
                ->join('tipe_tmi',DB::raw('substring(master_plu.mrg_id, 1, 2)') ,'=', 'tipe_tmi.kode_tmi')
                ->select(
                'master_plu.kodeplu',
                'master_plu.long_desc',
                'branches.kode_igr',
                'branches.name',
                'tipe_tmi.nama'
                )
                ->where('branches.name', $request->filter_branch)
                ->where('tipe_tmi.nama',$request->filter_type)
                ->limit(100)
                ->get();
            }
            else
            {
                $nilai = DB::table('master_plu')
                ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
                ->join('tipe_tmi',DB::raw('substring(master_plu.mrg_id, 1, 2)') ,'=', 'tipe_tmi.kode_tmi')
                ->select(
                'master_plu.kodeplu',
                'master_plu.long_desc',
                'branches.kode_igr',
                'branches.name',
                'tipe_tmi.nama'
                )

               ->limit(100)
                ->get();
            }
            return datatables()->of($nilai)->make(true);
        }

        $cabang =DB::table('branches')
     //  ->select('id','name','kode_igr')
     ->select("*")
        ->where ('kode_igr', '>', '00')
        ->get();

        $tipe =DB::table('tipe_tmi')
        ->select("*")
        ->get();

        return view ('produk.produk', compact ('cabang','tipe'));


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
