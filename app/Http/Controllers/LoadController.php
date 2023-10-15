<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoadModel;
use App\Models\AgencyModel;
use DB;
class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $load=LoadModel::get();
        return view('loaddetails',compact('load'));
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
        $newload=$request->get('newload');
        $returnload=$request->get('returnload');

        $load=new LoadModel([
            'new_tanks_load'=>$newload,
            'tanks_returnto_company'=>$returnload
        ]);
        $load->save();
        return redirect('LoadDetails');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
