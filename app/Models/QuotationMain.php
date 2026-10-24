<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class QuotationMain extends Model
{
     use HasFactory;

    protected $table = 'quotation_main'; 

    protected $fillable = [
        'unique_id',
        'quotation_id',
        'screen_id',
        'customer_name',
        'mobile_no',
        'address',
        'total_amount',
        'is_active',
        'entry_date',
        'is_delete'
    ];
}
