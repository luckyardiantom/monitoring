<?php

namespace App\Http\Controllers;

use App\Maping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Services\DataTable;

class MapingController extends Controller
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

    public function index()
    {

        $nilai = DB::connection('mysql_2')
        ->table("products")
        ->join('branches','products.branch_id','=','branches.id')
        ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
        ->leftjoin('status_product_masters','products.status_product_master_id','=','status_product_masters.id')
        ->limit(100)
        ->orderBy('branches.name', 'asc')
        ->get(['products.plu',
        'products.id',
        'products.status_product_master_id',
        'products.description as desc',
        'status_product_masters.status as status',
        'branches.name',
        'tmi_types.description']);


        $cabang = DB::connection('mysql_2')
        ->table("branches")
        ->select("*")
        ->get();

        $tipe = DB::connection('mysql_2')
        ->table("tmi_types")
        ->select("*")
        ->get();

        $status = DB::connection('mysql_2')
        ->table("status_product_masters")
        ->select("*")
        ->get();

        $fill = DB::connection('mysql_2')
        ->table("products")
        ->join('branches','products.branch_id','=','branches.id')
        ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
        ->leftjoin('status_product_masters','products.status_product_master_id','=','status_product_masters.id')
        ->orderBy('branches.name', 'asc')
        ->select(
        'products.plu',
        'products.id',
        'products.status_product_master_id',
        'products.description as desc',
        'status_product_masters.status as status',
        'branches.name',

        'tmi_types.description'
       )

        ->limit(100)
        ->get();


        return view ('maping.maping', compact ('nilai','cabang','fill','status','tipe'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//TAG_VAN240122
    public function filter(Request $request){


        $cab = $request->name;
        $tmi = $request->description;
        $sta = $request->status;

        $nilai = DB::connection('mysql_2')
        ->table("products")
        ->join('branches','products.branch_id','=','branches.id')
        ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
        ->leftjoin('status_product_masters','products.status_product_master_id','=','status_product_masters.id')
        ->where('branches.name','=',$cab)
        ->where('tmi_types.description','=',$tmi)
        ->where('status_product_masters.status','=',$sta)
        ->orderBy('branches.name', 'asc')
        ->get(['products.plu',
        'products.id',
        'products.status_product_master_id',
        'products.description as desc',
        'status_product_masters.status as status',
        'branches.name',
        'tmi_types.description']);

        $cabang = DB::connection('mysql_2')
        ->table("branches")
        ->select("*")
        ->get();

        $tipe = DB::connection('mysql_2')
        ->table("tmi_types")
        ->select("*")
        ->get();

        $status = DB::connection('mysql_2')
        ->table("status_product_masters")
        ->select("*")
        ->get();

        $fill = DB::connection('mysql_2')
        ->table("products")
        ->join('branches','products.branch_id','=','branches.id')
        ->join('tmi_types','products.tmi_type_id','=','tmi_types.id')
        ->leftjoin('status_product_masters','products.status_product_master_id','=','status_product_masters.id')
        ->select(
        'products.plu',
        'products.id',
        'products.status_product_master_id',
        'products.description as desc',
        'status_product_masters.status as status',
        'branches.name',
        'tmi_types.description'
       )
       ->orderBy('branches.name', 'asc')
        ->limit(100)
        ->get();

       //dd($nilai);
        return view('maping.maping', compact('nilai','fill','cabang','status','tipe'));
    }

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
     * @param  \App\Maping  $maping
     * @return \Illuminate\Http\Response
     */
    public function show(Maping $maping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maping  $maping
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Maping::find($id);
        return view('maping.edit', ['nilai' => $data]);
    }

    public function proses_edit(Request $request, $id)
    {
      $this->validate($request, [
        'status_product_master_id' => 'required',
      ]);

      Maping::where('id', $id)
      ->update([
        'status_product_master_id' => $request->status_product_master_id,
      ]);

      return redirect('/maping');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maping  $maping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maping $maping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maping  $maping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maping $maping)
    {
        //
    }
}
