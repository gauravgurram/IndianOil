<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TanksData;

class WithdrawController extends Controller
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
        //
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
    public function update(Request $request, string $id)
    {
        $tanksreturntoday=$request->get("tanksreturntoday");

        $fab=DB::table("tanks_data")
        ->select("*")
        ->where("cid","=",$id)
        ->first();

        $tanksremaining=$fab->tanks_remaining-$tanksreturntoday;

        $prevtankremain=$fab->tanks_return_today+$tanksreturntoday;


        $cid=$fab->id;

            $Tanks=TanksData::find($cid);
            $Tanks->tanks_return_today=$prevtankremain;
            $Tanks->tanks_remaining=$tanksremaining;
            // $Tanks->tanks_price_per=$tankprice;
            // $Tanks->todays_total=$todaystotal;
            // $Tanks->previous_total=$prevtotal;
            // $Tanks->total=$completetotal;
            $Tanks->update();
            return redirect("CustomerDetails");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
