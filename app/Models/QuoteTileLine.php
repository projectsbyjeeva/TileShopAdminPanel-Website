<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteTileLine extends Model
{


 protected $table = 'quote_tile_line'; 

    protected $fillable = [
        'unique_id',
        'quotation_id',
        'screen_id',
        'design_name',
        'dark_line',
        'light_line',
        'highlight_line',
         'design_name',
        'dark_box',
        'light_box',
        'highlight_box',
        'total_box',
        'width',
        'height',
        'entry_date',
        'is_active',
        'is_delete'
    ];
}
