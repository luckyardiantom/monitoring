<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maping extends Model
{
    //
    protected $connection = 'mysql_2';
    protected $table = 'products';

    protected $fillable = [
        'status_product_master_id', 'tag_id',
        'category_id', 'branch_id',
        'tmi_type_id','plu', 'description',
        'price', 'unit', 'conversion',
        'frac_tmi','frac_igr','min_order',
        'min_qty','max_qty','created_at','updated_at',
        'deleted_at'
    ];


}
