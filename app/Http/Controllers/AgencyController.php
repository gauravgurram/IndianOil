<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgencyModel;
use App\Models\TanksData;
use App\Models\StockModel;
use DB;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanks=AgencyModel::get();
        return view('agencydetails',compact('tanks'));
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
        $owntanks=$request->get('owntanks');
        $tanks=new AgencyModel([
            'owntanks'=>$owntanks,
            'filled_tanks'=>$owntanks,
            'total_tanks'=>$owntanks
        ]);
        $tanks->save();
        return redirect('Agency');
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
        $data=AgencyModel::find($id);
        return view('agencydetailsupdate',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noofowntanks=$request->get('noofowntanks');
        $emptytanks=$request->get('emptytanks');
        $totaltanks=$request->get('totaltanks');

        $tanks=AgencyModel::find($id);
        $tanks->owntanks=$noofowntanks;
        $tanks->empty_tanks=$emptytanks;
        $tanks->total_tanks=$totaltanks;
        $tanks->update();
        return redirect('Agency');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
