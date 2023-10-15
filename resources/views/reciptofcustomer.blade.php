<!DOCTYPE html>
<head>
</head>
<body>
@php
    foreach ($regis as $d)
    {
         $customername= $d->customer_name;
         $tankgiventoday=$d->tanks_given_today;
         $tankreturntoday=$d->tanks_return_today;
         $tankremaining=$d->tanks_remaining;
         $tankprice=$d->tanks_price_per;
         $todaystotal=$d->todays_total;
         $previousamt=$d->previous_total;
         $advance=$d->today_given_amt;
         $completetotal=$d->total;
    }
@endphp

<style>
   table, td, th {
  border: 1px solid;
  text-align: center;
  margin:auto;
}

table {
  width: 40%;
  border-collapse: collapse;
}
</style>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table m-auto table-bordered">
                            <th colspan="2">

                            </th>
                            <tr>
                                <th colspan="2"><h3 class="text-center" id="customername">{{ $customername }}</h3></th>                               </th>
                            </tr>
                                <tr>
                                    <th class="border-bottom-0">Tanks Given</th>
                                    <td id="tanksgiven">{{ $tankgiventoday }}</td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">Tank Price</th>
                                    <td id="tankprice">{{ $tankreturntoday }}</td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">Total</th>
                                    <td id="todaystotal">{{ $todaystotal }}</td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">Previous Amount</th>
                                    <td id="previousamt">{{ $previousamt }}</td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">Complete Total</th>
                                    <td id="completeamt">{{ $completetotal }}</td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">Advance</th>
                                    <td id="advanceamt">{{ $advance }}</td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">Pending Amount</th>
                                    <td id="pendingamt">{{ $completetotal }}</td>
                                </tr>

                                <tr>
                                    <th class="border-bottom-0">Tank Remaining</th>
                                    <td id="tanksremaining">{{ $tankremaining}}</td>
                                </tr>

                                <tr>
                                    <th class="border-bottom-0">Tanks Return</th>
                                    <td id="tanksreturn">{{ $tankreturntoday }}</td>
                                </tr>
                        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


    </body>
</html>
