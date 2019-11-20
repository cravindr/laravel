<?php

namespace App;
/*use Eloquent;
use DB;*/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/*class Customer extends Eloquent*/
class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey='id';
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

    public static function getMaxCode($id)
    {
        $ret= DB::select(DB::raw("select concat(p.short_code,
                                                   LPAD(
                                                       if(
                                                           Max(
                                                                    convert(
                                                                             mid(code, 4, length(code))
                                                                            , UNSIGNED
                                                                            )
                                                              ) is null,1,Max(convert(mid(code, 4, length(code)), UNSIGNED))+1
                                                           ),
                                                       6,0))
                                             as Code from customer
                                            join place p on customer.place = p.id
                                            where place=$id"));

        $rets=$ret[0];
        return $rets->Code;
    }


}
