<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    //

    public function getPlace()
    {
        $place=DB::table("place")->get();
        return $place;
    }

    public function serversideplace()
    {
       return datatables( Place::all())->toJson();
    }

    public function save(Request $request)
    {
        $name=$request->input('name');

        $data=array(
            'short_code'=> $request->input('short_code'),
            'name'=> $request->input('name'),
            'status'=> 'active'
        );

       /* dd($data);*/

        $ret=DB::table('place')->insert($data);

        if($ret==1)
        {
            return redirect('registerplace')->with("success","The place $name registered successfully");
        }
        else
        {
            return redirect('registerplace')->with("failed","The place $name not registered Error !!!");
        }


    }

    public function Edit()
    {
        $id = request('id');
        //$id = 1;
        //$res = DB::table('place')->where('id',$id)->first();
        //$res = Place::where('id',$id)->first();

        /*With relationship data we have to use this method */

        //$place = Place::with('customer')->where('id',$id)->first();
                        /*Or*/

        $place = Place::where('id',$id)->first();
       $place->load('customer');



       //  $place = Place::where('id',$id)->first();

       /*$data = array(
            'place' => $res,
            'customer' => $res->customer
        );*/

       //dd($res);
      //echo json_encode(compact('place',$place->customer));
      echo json_encode($place);
    }

    public function Edit1($id){
        $place = DB::table('place')->where('id',$id)->first();
        return view('place.register1')->with(compact('place'));

    }

    public function Editsess(){
        $id=request('id');
        request()->session()->put('placeid',$id);
        return 1;
    }


    public function EditsessField()
    {

        $id = request()->session()->get('placeid');


        $place = DB::table('place')->where('id',$id)->first();
        return view('place.register1')->with(compact('place'));
    }


}
