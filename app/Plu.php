<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plu extends Model
{
    //

    protected $table = 'master_plu';

    protected $fillable = [
        'name', 'tag_id','kodeplu',
        'mrg_id','kode_igr','display',
        'long_desc','id','created_at','updated_at'
    ];

}
