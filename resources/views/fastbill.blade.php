<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Saki Indian Gas Retailer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
</style>
</head>

<div class="page-header text-blue-d2">
    <div class="page-tools">
        <div class="action-buttons">
            <button class="btn bg-white btn-light mx-1px text-95" onclick="printDiv('printableArea')" data-title="Print">
                <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
            </button>

    </div>
    </div>
</div>
<body>
 <div id="printableArea">
@php
    $tp=0;
    foreach ($regis as $d)
    {
        $myid=$d->billinvoice;
        $custid=$d->cid;
        $customername= $d->customer_name;
        $address=$d->address;
        $mobile=$d->mobile;
        $tankgiventoday=$d->tanks_given_today;
        $tankreturntoday=$d->tanks_return_today;
        $tankremaining=$d->tanks_remaining;
        $tankprice=$d->tanks_price_per;
        $tp=$tankprice;
        $todaystotal=$d->todays_total;
        $previousamt=$d->previous_total;
        $advance=$d->today_given_amt;
        $givendate=$d->givendate;
        $completetotal=$d->total;
    }
@endphp

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="page-content container">
<div class="container px-0" >
<div class="row mt-4">
<div class="col-12 col-lg-12">
<div class="row">
<div class="col-12">
<div class="text-center text-150">
<hr>
<img class="rounded float-left" src="{{ asset('backend/assets/images/logos/Indian_Oil_Corporation-Logo-removebg.png')}}" width="230" alt="" /><br>
<img class="rounded float-center" src="{{ asset('backend/assets/images/logos/titleimg.png')}}" width="270" alt="" /><br><br>
<h6 class="float-right">SAKHI INDANE NDNE RETAILER</h6>

</div>
</div>
<br>
<table class="table ">
    <thead>
      <tr>
        <th scope="col"><i class="fa fa-map-marker" aria-hidden="true"></i> Patrakar Bhavan Sath Rasta Solapur</th>
        <th scope="col"><i class="fa fa-phone "></i> 8308830369</th>
        <th scope="col"><i class="fa fa-envelope" aria-hidden="true"></i> 77210009az@gmail.com</th>
        <th scope="col">GSTIN : 27BNOPP3293G1ZH</th>
      </tr>
    </thead>
  </table>
</div>
<div class="row">
<div class="col-sm-6">
<div>
<span class="text-sm text-grey-m2 align-middle"><i class="fa fa-users" aria-hidden="true"></i></span>
<span class="text-600 text-110 text-blue align-middle">&emsp; {{ $customername }}</span>
</div>
<div class="text-grey-m2">
<div class="my-1">
    <i class="fa fa-map-marker fa-flip-horizontal text-secondary"></i>&emsp;&emsp; {{ $address }}
</div>
<div class="my-1">
</div>
<div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">&emsp; {{ $mobile }}</b></div>
</div>
</div>
<div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
<hr class="d-sm-none" />
<div class="text-grey-m2">
<div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
Invoice: {{ $myid }}
</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Customer ID: </span>{{ $custid }}</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date: </span>{{ $givendate }}</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-success badge-pill px-25" id="paid">Paid</span></div>
</div>
</div>
</div>
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-1">#</div>
<div class="col-9 col-sm-5">Description</div>
<div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
<div class="d-none d-sm-block col-sm-2">Unit Price</div>
<div class="col-2">Amount</div>
</div>
<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-1">1</div>
<div class="col-9 col-sm-5">19 KG Gas Tank</div>
<div class="d-none d-sm-block col-2">{{ $tankgiventoday }}</div>
<div class="d-none d-sm-block col-2 text-95"> ₹ {{ $tankprice }}</div>
<div class="col-2 text-secondary-d2">₹ {{ $todaystotal }}</div>
</div>
</div>
<div class="row border-b-2 brc-default-l2"></div>
<div class="row mt-3">
<div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
Extra note such as company or payment information...
</div>
<div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
<div class="row my-2">
<div class="col-7 text-right">
SubTotal
</div>
<div class="col-5">
<span class="text-120 text-secondary-d1"> ₹ {{ $todaystotal }}</span>
</div>
</div>

<div class="row my-2 align-items-center bgc-primary-l3 p-2">
    <div class="col-7 text-right">
    Total
    </div>
    <div class="col-5">
    <span class="text-150 text-success-d3 opacity-2 text-success"><h4><b>₹ {{ $todaystotal}} /-</b></h4></span>
    </div>
</div>
</div>
</div>
<hr/>
<div>
<span class="text-secondary-d1 text-105">Thank you for your business</span>
</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    function printDiv(divName)
    {
        $(document).ready(function(){
            $('#amount').hide();
            $('#prevtag').show();

        if($('#amount').val()>1)
        {
            $('#prevtag').show();
            $('#amount').hide();
        }

    });

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
  </script>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
