<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class TransaksiController extends Controller
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
                ->table("igr_transaction_headers")
                ->join('igr_transaction_details','igr_transaction_details.igr_transaction_id','=','igr_transaction_headers.id')
                ->join('user_products','igr_transaction_details.user_product_id','=','user_products.id')
                ->join('users','igr_transaction_headers.user_id','=','users.id')
                ->join('branches','users.branch_id','=','branches.id')
                ->select(
                'igr_transaction_headers.trx_no',
                'igr_transaction_headers.station',
                'igr_transaction_headers.cashier',
                'igr_transaction_headers.trx_date',
                'user_products.plu',
                'users.store_name',
                'branches.name',
                'user_products.description',
                'users.member_code'
                )
               // ->selectRaw('DATE_FORMAT(trx_date, "%d/%l/%y") as trx_date')
                ->where('users.store_name', $request->filter_branch)
               // ->where('igr_transaction_headers.station', $request->filter_station)
              //  ->where('igr_transaction_headers.cashier', $request->filter_cashier)
               // ->where('igr_transaction_headers.trx_no', $request->filter_trx)
                ->whereBetween('igr_transaction_headers.trx_date', array($request->from_date, $request->to_date))
                ->where('branches.name', $request->filter_branches)
                // ->where('igr_transaction_headers.station', $request->filter_station)
                //  ->orderBy('trx_date', 'desc')
             //  ->limit(10000)
                ->get();
            }
            else
            {
                $nilai = DB::connection('mysql_2')
                ->table("igr_transaction_headers")
                ->join('igr_transaction_details','igr_transaction_details.igr_transaction_id','=','igr_transaction_headers.id')
                ->join('user_products','igr_transaction_details.user_product_id','=','user_products.id')
                ->join('users','igr_transaction_headers.user_id','=','users.id')
                ->join('branches','users.branch_id','=','branches.id')
                ->select(
                'igr_transaction_headers.trx_no',
                'igr_transaction_headers.station',
                'igr_transaction_headers.cashier',
                'branches.name',
                'igr_transaction_headers.trx_date',
                'user_products.plu',
                'user_products.description',
                'users.store_name',
                'users.member_code'
                )
                //->selectRaw('DATE_FORMAT(trx_date, "%d/%l/%y") as trx_date')
              //  ->orderBy('trx_date', 'desc')
                ->limit(1000)
                ->get();
            }
            return datatables()->of($nilai)
            ->make(true);
        }

        $toko = DB::connection('mysql_2')
        ->table("users")
        ->select("*")
        ->get();

        $cabang = DB::connection('mysql_2')
        ->table("branches")
        ->select("*")
        ->get();


        return view ('transaksi.transaksi', compact ('toko','cabang'));

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
