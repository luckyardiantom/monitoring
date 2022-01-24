<?php

namespace App\Http\Controllers;

use App\Master;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\Request;

class MasterController extends Controller
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
                ->table("products")
                ->join('branches','products.branch_id','=','branches.id')
                ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
                ->select(
                'branches.name',
                'tmi_types.description',
                'products.description  as produk',
                'products.price',
                'products.plu',
                'products.tag_id',
                'products.unit'
                )
                //->where('products.tag_id', '<>', '')
                ->where('branches.name', $request->filter_branch)
                ->where('tmi_types.description',$request->filter_type)
                ->limit(100)
                ->get();
            }
            else
            {
                $nilai = DB::connection('mysql_2')
                ->table("products")
                ->join('branches','products.branch_id','=','branches.id')
                ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
                ->select(
                'branches.name',
                'tmi_types.description',
                'products.description  as produk',
                'products.plu',
                'products.tag_id',
                'products.price',
                'products.unit'
                )
               //->where('products.tag_id', '<>', '')
               ->limit(100)
                ->get();
            }
            return datatables()->of($nilai)->make(true);
        }
       $cabang = DB::connection('mysql_2')
        ->table("branches")
        ->select("*")
        ->get();

        $tipe = DB::connection('mysql_2')
        ->table("tmi_types")
        ->select("*")
        ->get();

        return view ('master_plu.master_plu', compact ('cabang','tipe'));

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
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        //
    }
}
