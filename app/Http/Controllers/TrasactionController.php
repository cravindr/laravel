<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrasactionController extends Controller
{
    //

    public function index()
    {
        $ret=DB::select(DB::raw("SELECT
                                    t.id,
                                    t.date,
                                    t.total_amount,
                                    @days:=TIMESTAMPDIFF(day,date,
                                                        (SELECT min(date) FROM transaction WHERE date > t.date )
                                                        ) AS days,
                                   t.amount,
                                   (t.total_amount*@days*2*12)/(365*100) as intersec
                                    FROM transaction as t"));
        dd($ret);
    }
}
