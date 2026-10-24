<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\UserType;

class UserCreation extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'user_creation';

    protected $fillable = [
        'unique_id',
        'user_type',
        'name',
        'user_name',
        'password',
        'hash_password',
        'mobile_no',
        'email_id',
        'is_active',
        'is_delete'
    ];

    public function role(){
        
            return $this->belongsTo(UserType::class,'user_type','unique_id');

    }
}