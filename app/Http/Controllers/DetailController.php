<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nilai = DB::connection('mysql_2')
                ->table("igr_transaction_headers")
                ->join('igr_transaction_details','igr_transaction_details.igr_transaction_id','=','igr_transaction_headers.id')
                ->join('user_products','igr_transaction_details.user_product_id','=','user_products.id')
                ->join('users','igr_transaction_headers.user_id','=','users.id')
                ->select(
                'igr_transaction_headers.id',
                'igr_transaction_headers.trx_no',
                'igr_transaction_headers.station',
                'igr_transaction_headers.cashier',
                'igr_transaction_headers.trx_date',
                'user_products.plu',
                'users.store_name',
                'users.member_code'
                )
                ->selectRaw('DATE_FORMAT(trx_date, "%d/%l/%Y") as trx_date')
                ->limit(100)
               // ->find($id)
                ->get();

               return view('detail.detail', ['nilai' => $nilai]);
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
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
