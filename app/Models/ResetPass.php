<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPass extends Model
{
    protected $table = 'password_resets';

     protected $fillable = [
     	'email','token'
	];

}
