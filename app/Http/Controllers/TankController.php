<?php

namespace App\Http\Controllers;

use App\Models\CustomerData;
use Illuminate\Http\Request;
use App\Models\TanksData;
use App\Models\AgencyModel;
use App\Models\StockModel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BillModel;
use Illuminate\Support\Facades\Redirect;



class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tanks = TanksData::get();
        $Customer = CustomerData::get();
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.cid as pid')
            ->get();
        return view('tankdetails', compact('Tanks', 'Customer', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerid = $request->get('customerid');
        $tanksgiventoday = $request->get('tanksgiventoday');
        $tanksreturntoday = $request->get('tanksreturntoday');
        $tankprice = $request->get('tankprice');
        $advanceamt = $request->get('advanceamt');
        $paymentmode = $request->get('paymentmode');

        $fabe = DB::table("tanks_data")
            ->select("*")
            ->where("cid", "=", $customerid)
            ->count();

        if ($fabe >= 1) {

            $fabed = DB::table("tanks_data")
                ->select(DB::raw("MAX(id) as maxid"))
                ->where("cid", "=", $customerid)
                ->first();

            $fab = DB::table("tanks_data")
                ->select("*")
                ->where("id", "=", $fabed->maxid)
                ->first();

            $td = 0;
            if ($fab->tanks_remaining == "0") {
                $tanksremaining = $tanksgiventoday;
            } else {
                $tanksremaining = $fab->tanks_remaining + $tanksgiventoday;
            }


            $previoustank = $fab->tanks_remaining;


            $todaystotal = $tanksgiventoday * $tankprice;



            $previoustotal = $fab->total;


            $completetotal = $previoustotal + $todaystotal - $advanceamt;

            $random1 = rand(1, 10000);

            $TanksData = new TanksData([
                'cid' => $customerid,
                'tanks_given_today' => $tanksgiventoday,
                'tanks_return_today' => $tanksreturntoday,
                'tanks_remaining' => $tanksremaining - $tanksreturntoday,
                'previous_remaining_tanks' => $previoustank,
                'tanks_price_per' => $tankprice,
                'today_given_amt' => $advanceamt,
                'payment_method' => $paymentmode,
                'todays_total' => $todaystotal,
                'previous_total' => $previoustotal,
                'total' => $completetotal,
                'billinvoice' => $random1

            ]);
            $TanksData->save();

            $random = rand(1, 10000);
            $today = date('Y-m-d');
            $savebill = new BillModel([
                'cid' => $customerid,
                'invoiceno' => $random,
                'date' => $today,
                'tankgiventoday' => $tanksgiventoday,
                'tankreturntoday' => $tanksreturntoday,
                'tankremaining' => $tanksremaining - $tanksreturntoday,
                'tankprice' => $tankprice,
                'totalprice' => $tankprice,
                'todaystotal' => $todaystotal,
                'previousamt' => '0',
                'advance' => $advanceamt,
                'completetotal' => $completetotal
            ]);
            $savebill->save();


            $stock = new StockModel([
                'cid' => $customerid,
                'tanksgiven' => $tanksgiventoday,
                'tankstaken' => $tanksreturntoday
            ]);
            $stock->save();
            $sumoftankgiven = StockModel::sum('tanksgiven');
            $sumoftanktaken = StockModel::sum('tankstaken');
            $agency = AgencyModel::find(1);
            $agency->customer_having_tanks = $sumoftankgiven - $sumoftanktaken;

            $agency->filled_tanks = $agency->filled_tanks - $tanksgiventoday;


            if ($agency->empty_tanks == "0") {
                $agency->empty_tanks = $tanksreturntoday;
            } else {
                $agency->empty_tanks = $agency->empty_tanks + $tanksreturntoday;
            }

            $agency->total_tanks = $agency->owntanks - $agency->lost_tanks;
            $agency->update();
            $Customer = CustomerData::get();
            $Agency = AgencyModel::get();
            return view('registerdetails', compact('Customer', 'Agency'));
        } else {
            $todtol = $tanksgiventoday * $tankprice;

            $random1 = rand(1, 10000);

            $TanksData = new TanksData([
                'cid' => $customerid,
                'tanks_given_today' => $tanksgiventoday,
                'tanks_return_today' => $tanksreturntoday,
                'tanks_remaining' => $tanksgiventoday,
                'tanks_price_per' => $tankprice,
                'todays_total' => $todtol,
                'previous_total' => "0",
                'today_given_amt' => $advanceamt,
                'payment_method' => $paymentmode,
                'previous_remaining_tanks' => "0",
                'total' => $todtol - $advanceamt,
                'billinvoice' => $random1
            ]);
            $TanksData->save();

            $random = rand(1, 10000);

            $today = date('Y-m-d');
            $savebill = new BillModel([
                'cid' => $customerid,
                'invoiceno' => $random,
                'date' => $today,
                'tankgiventoday' => $tanksgiventoday,
                'tankreturntoday' => $tanksreturntoday,
                'tankremaining' => $tanksgiventoday,
                'tankprice' => $tankprice,
                'totalprice' => $tankprice,
                'todaystotal' => $todtol,
                'previousamt' => '0',
                'advance' => $advanceamt,
                'completetotal' => $tanksgiventoday * $tankprice
            ]);
            $savebill->save();



            $stock = new StockModel([
                'cid' => $customerid,
                'tanksgiven' => $tanksgiventoday,
                'tankstaken' => "0"
            ]);
            $stock->save();
            $sumoftankgiven = StockModel::sum('tanksgiven');
            $sumoftanktaken = StockModel::sum('tankstaken');
            $agency = AgencyModel::find(1);
            $agency->customer_having_tanks = $sumoftankgiven - $sumoftanktaken;
            $agency->filled_tanks = $agency->owntanks - $sumoftankgiven;
            $agency->total_tanks = $agency->owntanks - $agency->lost_tanks;
            $agency->update();
            $Customer = CustomerData::get();
            $Agency = AgencyModel::get();
            return view('registerdetails', compact('Customer', 'Agency'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TanksData::find($id);
        return view('tankdetailsupdate', compact('data'));
        // echo "<pre>";
        // print_r($tanks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tanksgiventoday = $request->get('tanksgiventoday');
        $tanksreturntoday = $request->get('tanksreturntoday');
        $tankprice = $request->get('tankprice');
        $advanceamt = $request->get('advanceamt');
        $paymentmode = $request->get('paymentmode');
        $customerid = $request->get('customerid');

        $raw = TanksData::find($id);
        $gtank = $tanksgiventoday;
        $rate = $tankprice;
        $adv = $advanceamt;
        $tankreturn = $tanksreturntoday;

        $gross = $gtank * $rate;
        $prev = $raw->previous_total;

        $total = $gross + $prev;

        $outstanding = $total - $adv;

        $remaintanks = ($raw->previous_remaining_tanks + $gtank) - $tanksreturntoday;

        $outstanding_tank = $remaintanks;
        $raw->tanks_given_today = $gtank;
        $raw->tanks_return_today = $tanksreturntoday;
        $raw->tanks_remaining = $remaintanks;
        $raw->tanks_price_per = $rate;
        $raw->todays_total = $gross;
        $raw->today_given_amt = $adv;

        $raw->total = $outstanding;
        $raw->save();

        $records = TanksData::where('id', '>', $id)
            ->where('cid', '=', $customerid)
            ->get();

        foreach ($records as $record) {
            $raw = TanksData::find($record->id);
            // return response()->json($record);
            $gtank = $record->tanks_given_today;
            $rate = $record->tanks_price_per;
            $adv = $record->today_given_amt;
            $tanksreturntoday = $record->tanks_return_today;
            // $tanksreturntoday
            $gross = $gtank * $rate;
            $prev = $outstanding;

            $total = $gross + $prev;

            $outstanding = $total - $adv;

            $raw->tanks_given_today = $gtank;
            $raw->tanks_return_today = $tanksreturntoday;
            $raw->previous_remaining_tanks = $outstanding_tank;
            $raw->tanks_remaining = ($raw->previous_remaining_tanks + $gtank) - $tanksreturntoday;
            $raw->tanks_price_per = $rate;
            $raw->todays_total = $gross;
            $raw->today_given_amt = $adv;
            $raw->previous_total=$prev;
            $raw->total = $outstanding;

            $raw->save();
            $remaintanks = ($raw->previous_remaining_tanks + $gtank) - $tanksreturntoday;
            $outstanding_tank = $remaintanks;
        }

        $Customer = CustomerData::get();
        $Agency = AgencyModel::get();

        // return view('registerdetails', compact('Customer', 'Agency'));
        return redirect('Register');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tanks = TanksData::find($id);
        $tanks->delete();
        return redirect('TankDetails');
    }

    public function gettankdata(Request $request)
    {
        $fromdate = $request->get('fromdate');
        $todate = $request->get('todate');
        $tanktbl = DB::table('tanks_data')
            ->join("customer_data", "tanks_data.cid", "=", "customer_data.id")
            ->whereBetween("tanks_data.givendate", [$fromdate, $todate])
            ->select("*", "tanks_data.id as tid")
            ->get();
        return response()->json($tanktbl);
    }


    public function gettankdata2(Request $request)
    {
        $fromdate = $request->get('fromdate');
        $tanktbl = DB::table('tanks_data')
            ->join("customer_data", "tanks_data.cid", "=", "customer_data.id")
            ->where("tanks_data.givendate", '=', $fromdate)
            ->select("*", "tanks_data.id as tid")
            ->get();
        return response()->json($tanktbl);
    }

    public function Register()
    {

        $Tanks = TanksData::get();
        $Customer = CustomerData::get();
        $Agency = AgencyModel::get();
        $today = date('Y-m-d');

        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid')
            ->where('tanks_data.givendate', '=', $today)
            ->get();

        return view('registerdetails', compact('Tanks', 'Customer', 'data', 'Agency'));
    }


    public function registerpdf()
    {
        $today = date('Y-m-d');
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid')
            ->where('tanks_data.givendate', '=', $today)
            ->get();


        $paymentTotals = TanksData::select('payment_method', DB::raw('SUM(today_given_amt) as total_amount'))
            ->groupBy('payment_method')
            ->where('givendate', '=', $today)
            ->get();

        $regis = $data->toArray();


        return view('sampledata', compact('regis', 'paymentTotals'));
    }


    public function searchdata(Request $request)
    {
        $cid = $request->get('cid');

        $tanktbl = DB::table('tanks_data')
            ->join("customer_data", "tanks_data.cid", "=", "customer_data.id")
            ->where("tanks_data.cid", "=", $cid)
            ->select("*", "tanks_data.id as tid")
            ->orderBy('tanks_data.id', 'desc')
            ->first();

        return response()->json($tanktbl);
    }

    public function searchdata2(Request $request)
    {
        $cid = $request->get('cid');
        $tanktbl = DB::table('tanks_data')
            ->join("customer_data", "tanks_data.cid", "=", "customer_data.id")
            ->where("tanks_data.cid", "=", $cid)
            ->select("*", "tanks_data.id as tid")
            ->get();
        return response()->json($tanktbl);
    }

    public function reciptPDF($id)
    {
        $today = date('Y-m-d');
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid')
            ->where('tanks_data.cid', '=', $id)
            ->get();
        $custname = CustomerData::find($id);
        $regis = $data->toArray();
        $pdf = PDF::loadView('reciptofcustomer', compact('regis'));
        return $pdf->download("$today-$custname->customer_name recipt.pdf");
    }


    public function bill($id)
    {
        $today = date('Y-m-d');
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->join('bill_models', 'customer_data.id', '=', 'bill_models.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid', 'bill_models.invoiceno as invo')
            ->where('tanks_data.cid', '=', $id)
            ->get();
        $custname = CustomerData::find($id);
        $regis = $data->toArray();
        return view('company_invoice', compact('regis', 'today'));
    }


    public function bill2($id)
    {
        $today = date('Y-m-d');
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid')
            ->where('tanks_data.billinvoice', '=', $id)
            ->get();
        $custname = CustomerData::find($id);
        $regis = $data->toArray();
        return view('company_invoice_duplicate', compact('regis', 'today'));
    }


    public function fastbill($id)
    {
        $today = date('Y-m-d');
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->join('bill_models', 'customer_data.id', '=', 'bill_models.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid', 'bill_models.invoiceno as invo')
            ->where('tanks_data.id', '=', $id)
            ->get();
        $regis = $data->toArray();
        return view('fastbill', compact('regis', 'today'));
    }

    public function fastbill2($id)
    {
        $today = date('Y-m-d');
        $data = DB::table('customer_data')
            ->join('tanks_data', 'customer_data.id', '=', 'tanks_data.cid')
            ->join('bill_models', 'customer_data.id', '=', 'bill_models.cid')
            ->select('*', 'customer_data.id as cid', 'tanks_data.id as tid', 'bill_models.invoiceno as invo')
            ->where('tanks_data.billinvoice', '=', $id)
            ->get();
        $regis = $data->toArray();
        return view('fastbill', compact('regis', 'today'));
    }

    public function searchdata3(Request $request)
    {
        $invoiceno = $request->get('invoiceno');
        $tanktbl = DB::table('customer_data')
            ->join("tanks_data", "customer_data.id", "=", "tanks_data.cid")
            ->where("tanks_data.billinvoice", '=', $invoiceno)
            ->select("*")
            ->get();

        return response()->json($tanktbl);
    }
}
