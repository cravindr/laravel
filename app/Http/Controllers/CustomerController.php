<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //

    public function list()
    {
        return view('customer.customer_list');
    }

    public function save(Request $request)
    {
        echo "<pre>";
    //print_r($request->all());
    $name=$request->input('name');
    $data=array(
        'name'=>$request->input('name'),
        'code'=>'PER1010',
        'father_name'=>$request->input('father_name'),
        'family_name'=>$request->input('family_name'),
        'mobile'=>$request->input('mobile'),
        'address'=>$request->input('address'),
        'place'=>$request->input('place'),
        'referer_name'=>$request->input('referer_name'),
        'referer_mobile'=>$request->input('referer_mobile'),
        'remerks'=>$request->input('remarks')
        );
    //echo "<br>";
    //print_r($data);
    $ret=DB::table('customer')->insert($data);
//print_r($ret);
    if($ret==1)
    {
      return  redirect('register')->with('success', "$name's Record Saved Successfully");

    }
    else
    {
     return   redirect('register')->with('faild'," $name's Record not Saved ");
    }

    }

}
