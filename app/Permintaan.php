<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    //
    protected $connection = 'mysql_2';
    protected $fillable = [
        'address', 'po_number', 'po_date',
        'total_items_order','total_items_fulfilled',
        'price_order'
       ];
}
