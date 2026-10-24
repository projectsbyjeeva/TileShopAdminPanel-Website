<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'user_type'; // (check your real table name)

    protected $fillable = [
        'unique_id',
        'user_type',
        'is_active',
        'is_delete'
    ];
}