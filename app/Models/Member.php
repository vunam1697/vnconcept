<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
   	protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'phone', 'date_of_birth', 'month_of_birth', 'year_of_birth', 'address' , 'password',
        'id_manufacture', 'type', 'id_city', 'id_district', 'id_ward', 'google_id', 'facebook_id', 'status', 'code_otp'
    ];
}
