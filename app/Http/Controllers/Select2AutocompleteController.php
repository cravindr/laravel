<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;


class Select2AutocompleteController extends Controller
{
    /**
     * Show the application layout.
     *
     * @return \Illuminate\Http\Response
     */
    public function layout()
    {
        return view('select2.select2');
    }


    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
        $data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("categories")
                ->select("id","name")
                ->where('name','LIKE',"%$search%")
                ->get();
        }

        return response()->json($data);
    }

         public function groupData()
        {
            $all = [
                // First Group
                [
                    'id'        => 10,
                    'text'      => 'Group_One',
                    'children'  => [
                        ['id' => 11, 'text' => 'Field_1_Group_One'],
                        ['id' => 12, 'text' => 'Field_2_Group_One']
                    ]
                ],
                // Second Group
                [
                    'id'        => 20,
                    'text'      => 'Group_Two',
                    'children'  => [
                        ['id' => 21, 'text' => 'Field_1_Group_Two'],
                        ['id' => 22, 'text' => 'Field_2_Group_Two']
                    ]
                ],
            ];

            return ($all);

        }


}
