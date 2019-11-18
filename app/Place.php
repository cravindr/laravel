<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
/*use Eloquent;
use DB;*/

/*class Place extends Eloquent*/
class Place extends Model
{
    //
    protected $table = 'place';
    protected $primaryKey='id';

    public function customer()
    {
        /*return $this->belongsTo('App\Customer','id','place');*/
        return $this->hasMany('App\Customer','place','id');

    }
}
