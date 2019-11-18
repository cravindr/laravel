<?php

namespace App;
/*use Eloquent;
use DB;*/

use Illuminate\Database\Eloquent\Model;


/*class Customer extends Eloquent*/
class Customer extends Model
{
    protected $table = 'customer';
    //

    public function getPlace()
    {
        return Place::where('id',$this->place)->first()->name;
    }
    public function getShortCode()
    {
        return Place::where('id',$this->place)->first()->short_code;
    }

    /*public function placedet()
    {
        return $this->belongsTo('App\Place','foreign_key','other_key');
    }*/


    public function placed()
    {
        return $this->hasOne('App\Place','id','place');
    }
}
