<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Plu;
use Illuminate\Http\Request;

class PluController extends Controller
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
        $nilai = DB::table('master_plu')
        ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
        ->join('products','master_plu.kode_igr','=','products.kode_igr')
        ->limit(100)
        ->get(['products.prdcd',
        'products.long_description',
        'master_plu.mrg_id',
        'branches.name',
        'master_plu.id']);

        $cabang =DB::table('branches')
        ->select("*")
        ->where ('kode_igr', '>', '00')
        ->get();


        $fill = DB::table('master_plu')
        ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
        ->join('products','master_plu.kode_igr','=','products.kode_igr')
        ->limit(100)
        ->select(
            'products.prdcd',
            'products.long_description',
            'master_plu.mrg_id',
            'branches.name',
            'master_plu.id'
           )
        ->limit(100)
        ->get();


        return view ('plu.plu', compact ('nilai','cabang','fill'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //TAG_VAN240122

    public function filter(Request $request){


        $cab = $request->name;

        $nilai = DB::table('master_plu')
        ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
        ->join('products','master_plu.kode_igr','=','products.kode_igr')
        ->where('branches.name','=',$cab)
        ->limit(100)
        ->get(['products.prdcd',
        'products.long_description',
        'master_plu.mrg_id',
        'branches.name',
        'master_plu.id']);

        $cabang =DB::table('branches')
        ->select("*")
        ->where ('kode_igr', '>', '00')
        ->get();

        $fill = DB::table('master_plu')
        ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
        ->join('products','master_plu.kode_igr','=','products.kode_igr')
        ->select(
            'products.prdcd',
            'products.long_description',
            'master_plu.mrg_id',
            'branches.name',
            'master_plu.id'
           )
        ->limit(100)
        ->get();


       //dd($nilai);
        return view('plu.plu', compact('nilai','fill','cabang'));
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
     * @param  \App\Plu  $plu
     * @return \Illuminate\Http\Response
     */
    public function show(Plu $plu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plu  $plu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Plu::find($id);
        return view('plu.edit', ['nilai' => $data]);
    }

    public function proses_edit(Request $request, $id)
    {
      $this->validate($request, [
        'mrg_id' => 'required|numeric',
      ]);

      Plu::where('id', $id)
      ->update([
        'mrg_id' => $request->mrg_id,
      ]);

      return redirect('/plu');
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plu  $plu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plu $plu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plu  $plu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plu $plu)
    {
        //
    }
}
