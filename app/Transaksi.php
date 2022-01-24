<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //

    protected $connection = 'mysql_2';
    protected $dates = ['igr_transaction_headers.trx_date'];
    // protected $table = 'igr_transaction_details';
    // protected $fillable= [

    //  'igr_transaction_details.igr_transaction_id',
    // 'igr_transaction_details.quantity',
    // 'igr_transaction_details.price'
    //   ];
}
