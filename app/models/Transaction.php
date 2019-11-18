<?php

namespace App\models;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public static function myFunc()
    {
        return Customer::where('id',1)->first();
    }
}
