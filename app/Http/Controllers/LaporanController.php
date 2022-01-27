<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\User;
use App\Branch;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class LaporanController extends Controller
{
    //
    public function index(Request $request)
    {
        $toko = DB::table('users')
        ->select('*')
        ->get();

        $cabang = DB::table('branches')
        ->select('*')
        ->get();

        // $toko = DB::connection('mysql_2')
        // ->table('users')
        // ->select('*')
        // ->get();
        

        // $cabang = DB::connection('mysql_2')
        // ->table('branches')
        // ->select('*')
        // ->get();

        return view('laporan.isaku',compact('toko','cabang'));
    }

    public function exportIsaku(Request $request)
    {
        $nilai = DB::connection('mysql_2')
        ->table("trx_headers")
        ->join("payment_methods",'payment_methods.id','=','trx_headers.payment_method_id')
        ->join("users","users.id","trx_headers.user_id")
        ->join("shift_reports","shift_reports.id",'=',"trx_headers.shift_id")
        ->join("branches","branches.id","=","users.branch_id")
        ->select('users.member_code',
        'users.name',
        'users.store_name',
        'trx_headers.grand_total',
        'trx_headers.trx_date',
        'branches.name')
        ->where('payment_methods.description','=','i.saku')
        ->where('users.store_name',$request->filter_branch)
        ->where('branches.name',$request->filter_branches)
        ->whereBetween('trx_headers.trx_date',array($request->from_date , $request->to_date))
        ->get();
        

        return Excel::query($nilai)
        ->download('Laporan Isaku '+ $bulan);   
    }
}
