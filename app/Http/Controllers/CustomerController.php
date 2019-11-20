<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Place;
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

        $place=$request->input('place');
        $code=Customer::getMaxCode($place);




        $name = $request->input('name');
        $data = array(
            'name' => $request->input('name'),
            'code' => $code,
            'father_name' => $request->input('father_name'),
            'family_name' => $request->input('family_name'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'place' => $request->input('place'),
            'referer_name' => $request->input('referer_name'),
            'referer_mobile' => $request->input('referer_mobile'),
            'remerks' => $request->input('remarks')
        );

        $ret = DB::table('customer')->insert($data);

        if ($ret == 1) {
            return redirect('customer/register')->with('success', "$name's Record Saved Successfully");

        } else {
            return redirect('customer/register')->with('faild', " $name's Record not Saved ");
        }

    }


    public function serversidecustomer()
    {
        $customer=Customer::all();
        $customer->load('placed');
        //dd($customer);
        return datatables($customer)->toJson();
    }


    public function AssignId(){
        $id=request('id');
        request()->session()->put('customerid',$id);
        return 1;
    }

    public function Edit()
    {
        $id = request()->session()->get('customerid');
        $customer = DB::table('customer')->where('id',$id)->first();
        return view('customer.edit')->with(compact('customer'));
    }

    public function Update(Request $request)
    {

        $name= $request->input('name');
        $id= $request->input('id');
        $data = array(
             'name' => $request->input('name'),

            'father_name' => $request->input('father_name'),
            'family_name' => $request->input('family_name'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'place' => $request->input('place'),
            'referer_name' => $request->input('referer_name'),
            'referer_mobile' => $request->input('referer_mobile'),
            'remerks' => $request->input('remarks')
        );

        $ret = DB::table('customer')->where('id',$id)->update($data);

        if ($ret == 1) {
            return redirect('customer')->with('success', "$name's Record Saved Successfully");

        } else {
            return redirect('customer')->with('faild', " $name's Record not Saved ");
        }

    }

    public function Delete()
    {
        $id=request('id');


        $ret=DB::table('customer')->where('id',$id)->delete();

        return $ret;

        /*if ($ret == 1) {
            return redirect('customer')->with('success', "$id's Record Saved Successfully");

        } else {
            return redirect('customer')->with('faild', " $id's Record not Saved ");
        }*/
    }

}
