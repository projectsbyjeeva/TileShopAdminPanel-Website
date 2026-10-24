<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationSub extends Model
{
      protected $table = 'quotation_sub'; 

    protected $fillable = [
        'unique_id',
        'quotation_id',
        'screen_id',
        'design_name',
        'product',
        'qty',
        'rate_type',
        'tile_categ',
        'tile_size',
        'sq_ft',
        'rate',
        'total_box',
        'amount',
        'total_amount',
        'width',
        'height',
        'entry_date',
        'is_active',
        'is_delete'
    ];
}
