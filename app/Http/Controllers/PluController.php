<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Plu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

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
        ->limit(10000)
        ->orderBy('branches.name', 'asc')
        ->get(['master_plu.kodeplu',
        'master_plu.long_desc',
        'master_plu.mrg_id',
        'master_plu.hrg_jual',
        'master_plu.kode_igr',
        'branches.name',
        'master_plu.id']);


        $cabang =DB::table('branches')
        ->select("*")
        ->where ('kode_igr', '>', '00')
        ->get();


        $fill = DB::table('master_plu')
        ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
        ->limit(10000)
       ->orderBy('branches.name', 'asc')
       ->select(
            'master_plu.kodeplu',
            'master_plu.long_desc',
            'master_plu.kode_igr',
            'master_plu.hrg_jual',
            'master_plu.mrg_id',
            'branches.name',
            'master_plu.id'
           )
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
        ->where('branches.name','=',$cab)
        ->limit(10000)
           ->orderBy('branches.name', 'asc')
        ->get(['master_plu.kodeplu',
        'master_plu.long_desc',
        'master_plu.kode_igr',
        'master_plu.hrg_jual',
        'master_plu.mrg_id',
        'branches.name',
        'master_plu.id']);

        $cabang =DB::table('branches')
        ->select("*")
        ->where ('kode_igr', '>', '00')
        ->get();

        $fill = DB::table('master_plu')
        ->join('branches','master_plu.kode_igr','=','branches.kode_igr')
           ->orderBy('branches.name', 'asc')
        ->select(
            'master_plu.kodeplu',
            'master_plu.long_desc',
            'master_plu.kode_igr',
            'master_plu.hrg_jual',
            'master_plu.mrg_id',
            'branches.name',
            'master_plu.id'
           )
        ->limit(10000)
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plu  $plu
     * @return \Illuminate\Http\Response
     */
    public function tambah($id)
    {

        $data = Plu::find($id);
        return view('plu.tambah', ['nilai' => $data]);
    }

    public function proses_edit(Request $request, $id)
    {

    //     $rules = [
    //         'kodeplu' => 'required|numeric',
    //         'kode_igr' => 'required|numeric',
    //        // 'mrg_id' => 'required',
    //         'mrg_id' => 'required|unique:master_plu',
    //     ];
    //     $messages=[
    //         'mrg_id.unique'         => 'Kode Margin Sudah Terdaftar',
    //     ];
    //     $validator = Validator::make($request->all(), $rules, $messages);

    // if($validator->fails()){
    //     return redirect()->back()->withErrors($validator)->withInput($request->all);
    // }
    // $role = new Plu();


    // $role->mrg_id = $request->mrg_id;


    // $simpan = $role->save();

    // return redirect('/plu');


      $this->validate($request, [
        'kodeplu' => 'required|numeric',
        'kode_igr' => 'required|numeric',
        'mrg_id' => 'required',
        //'mrg_id' => 'required|uniqe:master_plu',
      ]);


      Plu::where('id','=', $id)
      ->insert([
        'kodeplu' => $request->kodeplu,
        'kode_igr' => $request->kode_igr,
        'mrg_id' => $request->mrg_id,
      ]);

      return redirect('/plu');
    }




        // return redirect('/data_customer');



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
