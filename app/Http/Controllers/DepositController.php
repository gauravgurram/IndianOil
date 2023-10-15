<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TanksData;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $giventoday=$request->get("tanksgiventoday");
        $tankprice=$request->get("tankprice");


        $f=DB::table("tanks_data")
        ->select("*")
        ->where("cid","=",$id)
        ->count();

        if($f=="1")
        {
        $fab=DB::table("tanks_data")
        ->select("*")
        ->where("cid","=",$id)
        ->first();

        if($fab->tanks_remaining=="0")
        {
            $tanksremaining=$giventoday;
        }
        else
        {
            $tanksremaining=$fab->tanks_remaining+$giventoday;
        }

        $todaystotal=$fab->todays_total+$giventoday*$fab->tanks_price_per;

        $previoustotal=$fab->todays_total;

        $completetotal=$todaystotal+$previoustotal;

        $cid=$fab->id;

            $Tanks=TanksData::find($cid);
            $Tanks->tanks_given_today=$giventoday;
            $Tanks->tanks_remaining=$tanksremaining;
            $Tanks->tanks_price_per=$tankprice;
            $Tanks->todays_total=$todaystotal;
            $Tanks->previous_total=$previoustotal;
            $Tanks->total=$completetotal;
            $Tanks->update();
            return redirect("CustomerDetails");
         }

        else
        {

            $fab=DB::table("tanks_data")
                ->select("*")
                ->where("cid","=",$id)
                ->first();

            if($fab==NULL)
            {
                $remainingtank=$giventoday;
            }
            else if($fab->tanks_remaining=="0")
            {
                $remainingtank=$giventoday;
            }
            else
            {
                $remainingtank=$fab->tanks_remaining+$giventoday;
            }


            $data=new TanksData([
                'cid'=>$id,
                'tanks_given_today'=>$giventoday,
                'tanks_price_per'=>$tankprice,
                'todays_total'=>$tankprice,
                'tanks_remaining'=>$remainingtank,
                'previous_total'=>$tankprice,
                'total'=>$tankprice
            ]);
            $data->save();
            return redirect("CustomerDetails");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
