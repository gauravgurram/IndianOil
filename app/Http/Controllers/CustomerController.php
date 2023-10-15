<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerData;
use App\Models\TanksData;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BillModel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=CustomerData::get();
        return view("customerdetails",compact('data'));
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
        $custname=$request->get('custname');
        $address=$request->get('address');
        $mobile=$request->get('mobile');
        $gstno=$request->get('gstno');
        $aadhar=$request->get('aadhar');
        $deposit=$request->get('deposit');

        $data=new CustomerData([
            'customer_name'=>$custname,
            'address'=>$address,
            'mobile'=>$mobile,
            'gstno'=>$gstno,
            'aadharpan'=>$aadhar,
            'deposit'=>$deposit
        ]);
        $data->save();
        return redirect("CustomerDetails");
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
        $data=CustomerData::find($id);
        return view('customerdetailsupdate',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $custname=$request->get('custname');
        $address=$request->get('address');
        $mobile=$request->get('mobile');
        $gstno=$request->get('gstno');
        $aadhar=$request->get('aadhar');
        $deposit=$request->get('deposit');
        $data=CustomerData::find($id);
        $data->customer_name=$custname;
        $data->address=$address;
        $data->mobile=$mobile;
        $data->gstno=$gstno;
        $data->aadharpan=$aadhar;
        $data->deposit=$deposit;
        $data->update();
        return redirect("CustomerDetails");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tanks=CustomerData::find($id);
        $tanks->delete();
        return redirect('CustomerDetails');
    }
    public function getcustdata($id)
    {
        $tanktbl=DB::table('tanks_data')
                    ->join('customer_data','tanks_data.cid','=','customer_data.id')
                    ->where('tanks_data.cid','=',$id)
                    ->select('*','tanks_data.id as tid')
                    ->get();

        return response()->json($tanktbl);
    }

    public function createPDF($id)
    {
        $today = date('Y-m-d');
        $data=DB::table('customer_data')
        ->join('tanks_data','customer_data.id', '=','tanks_data.cid')
        ->select('*','customer_data.id as cid','tanks_data.id as tid')
        ->where('tanks_data.cid','=',$id)
        ->get();

        $custname=CustomerData::find($id);
        $regis = $data->toArray();
        return view('historyofcustomer',compact('regis'));
    }


    public function customersearch()
    {
        $Customer=CustomerData::get();
        return view('customersearch',compact('Customer'));
    }


    // public function pendingbill()
    // {
    //     $customer=DB::table('customer_data')
    //             ->select('id')
    //             ->get();

    //     $arr=array();
    //     foreach ($customer as $c)
    //     {
    //     $data = DB::table('customer_data')
    //     ->join('tanks_data','tanks_data.cid','=','customer_data.id')
    //     ->select('*', 'customer_data.id as cid')
    //     ->where('customer_data.id', '=', $c->id)
    //     ->orderBy('tanks_data.id', 'desc')
    //     ->first();
    //       array_push($arr,$data);
    //     }
    //    return view('pendingbill',compact('arr'));
    // }


    public function pendingbill()
{
    $customers = CustomerData::select('id', 'customer_name', 'mobile')
        ->get();

    $arr = array();
    foreach ($customers as $customer) {
        $data = TanksData::where('cid', $customer->id)
            ->orderBy('id', 'desc')
            ->first();

        if ($data) {
            $customer->tanks_remaining = $data->tanks_remaining;
            $customer->total = $data->total;
            $arr[] = $customer;
        }
    }

    return view('pendingbill', compact('arr'));
}



public function findbill()
    {
        $Customer=CustomerData::get();
        $Bill=BillModel::get();
        return view('findbill',compact('Customer','Bill'));
    }


}
