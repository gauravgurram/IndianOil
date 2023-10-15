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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        function printDiv(divName)
        {
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
<body>
@php
$date=date('d/m/y');
@endphp

 <div id="printableArea">
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
<img class="rounded float-center" src="{{ asset('backend/assets/images/logos/titleimg.png')}}" width="270" alt="" />
<br><br>
<h6 class="float-right">SAKHI INDANE NDNE RETAILER</h6>

</div>
</div>
</div>
<h6 class="text-right">GSTIN:27BNOPP3293G1ZH</h6>
<div class="row">
<hr class="d-sm-none" />
<div>
<div class="my-2"><h5 class="font-weight-bold">दिनांक : {{ $date }}</h5></div>
</div>
</div>
<br>
<table class="table table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">कस्टमर ID नंबर </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">कस्टमरचे नाव</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">दिनांक</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">बिल नंबर</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">पेमेंटचे ऑप्शन </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">टाकी दिले </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">दर</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">एकूण रक्कम </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">मागील रक्कम येणे </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0"> टोटल </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">आजची जमा रक्कम </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">आजरोजी येणे रक्कम बाकी</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">मागील गॅस टाकी येणे </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">चालू गॅस टाकी</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">जमा गॅस टाकी </h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">चालू येण गॅस टाकी</h6>
              </th>
            </tr>
            <tbody>
                    @php
                $advance=0;
            @endphp
            @foreach ($regis as $d)
            <tr style="text-align:center;">
                <td>{{ $d->cid }}</td>
                <td>{{ $d->customer_name }}</td>
                <td>{{ $d->givendate }}</td>
                <td>{{ $d->billinvoice }}</td>
                <td>{{ $d->payment_method }}</td>
                <td>{{ $d->tanks_given_today }}</td>
                <td>{{ $d->tanks_price_per }}</td>
                <td>{{ $d->todays_total }}</td>
                <td>{{ $d->previous_total }}</td>
                <td>{{ $d->todays_total+$d->previous_total }}</td>
                <td>{{ $d->today_given_amt }}</td>
                <td>{{ $d->total}}</td>
                <td>{{ $d->previous_remaining_tanks}}</td>
                <td>{{ $d->tanks_given_today}}</td>
                <td>{{ $d->tanks_return_today}}</td>
                <td>{{ $d->tanks_remaining}}</td>
                @php
                    $tanksremain=$d->tanks_remaining;
                    $totalamt=$d->total;
                    $advance=$advance+$d->today_given_amt;
                @endphp
            </tr>
            @endforeach
                </tbody>
            </table>
            <h4>Tanks Remaining : {{ $tanksremain }}</h4>
            <h4>Total Bill is :{{ $totalamt  }} /-</h4>
</div>
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

