<?php

namespace App\Http\Controllers;

use App\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
class BarcodeController extends Controller
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
        ->table("barcodes")
        ->join('products','barcodes.product_id','=','products.id')
        ->join('branches','products.branch_id','=','branches.id')
        ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
        ->select(
        'products.plu',
        'products.description as tm',
        'tmi_types.code',
        'branches.name',
        'tmi_types.description',
        'barcodes.barcode')
        // ->where('branches.name','like', $request->filter_branch)
        // ->where('tmi_types.description','like',$request->filter_type)
        ->where('branches.name', $request->filter_branch)
        ->where('tmi_types.description',$request->filter_type)
        ->limit(100)
        ->get();
    }
    else
    {
        $nilai = DB::connection('mysql_2')
        ->table("barcodes")
        ->join('products','barcodes.product_id','=','products.id')
        ->join('branches','products.branch_id','=','branches.id')
        ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
        ->select(
        'products.plu',
        'products.description as tm',
        'tmi_types.code',
        'branches.name',
        'tmi_types.description',
        'barcodes.barcode')
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

        return view ('barcode.barcode', compact ('cabang','tipe'));

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
