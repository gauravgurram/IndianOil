@extends('header')

@section('content')

@php
use App\Models\CustomerData;
use App\Models\AgencyModel;

$today = date('Y-m-d');

        $data=DB::table('customer_data')
        ->join('tanks_data','customer_data.id', '=','tanks_data.cid')
        ->select('*','customer_data.id as cid','tanks_data.cid as pid')
        ->where('tanks_data.givendate','=',$today)
        ->get();

        $tanks=DB::table('agency_models')
                ->select("*")
                ->count();
@endphp
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
@if ($tanks>=1)
<button id="myButton1" class="btn btn-primary">कस्टमर ला गॅस टाकी देणे</button>
@endif

@if($tanks<1)
<button class="btn btn-danger">कृपया गॅस टाक्या इन्सर्ट करा</button>
@endif

                <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('backend/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <script>
        // Add an event listener to the button
        document.getElementById("myButton1").addEventListener("click", function() {
          // Show or hide the div based on its current state
          var div = document.getElementById("myDiv");
          div.style.display = (div.style.display === "none") ? "block" : "none";
        });
      </script>
<br><br><br>
      <div class="container-fluid">
        <div class="container-fluid">
            <div id="myDiv" style="display: none;">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">कस्टमर ला गॅस टाकी देणे व घेणे </h5>
                    <div class="card">
                      <div class="card-body">
                        <form method="POST" action="{{ route('TankDetails.store') }}">
                          @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">सेलेक्ट - कस्टमरचे नाव व ID</label>
                            <select name="customerid" class="form-select">
                                <option value="">Select From Here </option>
                                {{ $Customer=CustomerData::get(); }}
                                @foreach ($Customer as $d)
                                <option value="{{ $d->id }}">{{ $d->id }}. {{ $d->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle text-center">
                            <thead class="text-dark fs-4">
                                <tr>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">मागील रक्कम येणे </h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">मागील गॅस टाकी येणे </h6>
                                </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="pendingamt" class="pendingamt"></td>
                                        <td id="tanksremaining" class="tanksremaining"></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    <br><br>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">गॅस टाकी दिले </label>
                        <input type="text" class="form-control" id="supply" name="tanksgiventoday"  aria-describedby="emailHelp">
                    </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">दर</label>
                            <input type="text" class="form-control" id="price" name="tankprice"  aria-describedby="emailHelp">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">एकूण रक्कम </label>
                            <input type="text" class="form-control" id="totalss" name="totalstoday"  aria-describedby="emailHelp">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">आजची जमा रक्कम </label>
                            <input type="text" class="form-control" id="advanced"  name="advanceamt"  aria-describedby="emailHelp">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">पेमेंटचे करण्याचे पध्दत </label>
                            <select name="paymentmode" class="form-select">
                                <option value="-">Select From Here </option>
                                <option value="Cash">Cash </option>
                                <option value="Online">Online </option>
                                <option value="Check">Check </option>
                            </select>
                        </div>

                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">गॅस टाकी रिटर्न </label>
                              <input type="text" class="form-control returned" id="returned" name="tanksreturntoday"  aria-describedby="emailHelp">
                          </div>

                        <button type="submit" class="btn btn-primary btnclass" id="btnid">Submit</button>

                          <h1 id="sam"></h1>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

                <script>
                    $(document).ready(function(){
                        var tnkrmn=0;
                        var pndamt=0;
                        var newpnd=0;
                        var newrmn=0;
                        var pen=0;
                        $('.btnclass').hide();
                        $('select').on('change',function(){
                            $('.btnclass').show();

                            var cid=$(this).val();
                            var redd=0;
                            var prevamt=0;
                            $.ajax({
                                    url:'/api/searchdata',
                                    method:'post',
                                    data : {
                                        cid : cid,
                                    },
                                    success:function(data)
                                    {
                                        console.log(data);

                                        tnkrmn=data.tanks_remaining;
                                        redd=data.tanks_remaining;
                                        prevamt=data.total;
                                        pndamt=data.total;
                                        console.log(tnkrmn+' '+pndamt);
                                        $("#tanksgiven").html(data.tanks_given_today);
                                        $("#tankprice").html(data.tanks_price_per);
                                        $("#todaystotal").html(data.todays_total);
                                        $("#previousamt").html(data.previous_total);
                                        $("#completeamt").html(data.total);
                                        $("#advanceamt").html(data.today_given_amt);
                                        $("#pendingamt").html(data.total);
                                        $("#tanksremaining").html(data.tanks_remaining);
                                        $("#tanksreturn").html(data.tanks_return_today);
                                        // console.log(data.length)
                                        if(!data.total){
                                            $("#pendingamt").html("");
                                            $("#tanksremaining").html("");
                                        }
                                    },
                                    error:function(data)
                                    {
                                        console.log(data);
                                    }
                            });

                            $('#supply').on('keyup',function(){
                                $('.tanksremaining').html(parseInt(tnkrmn)+parseInt($('#supply').val()));
                                newrmn=$('.tanksremaining').html();
                            });


                            $('#price').on('keyup',function(){
                                    $('#totalss').val($('#supply').val()*$('#price').val());
                                    $('#pendingamt').html( parseInt(pndamt)+parseInt($('#totalss').val()));
                                    newpnd=$('#pendingamt').html();
                                });

                            $('#advanced').on('keyup',function(){
                                    if(newpnd==0)
                                    {
                                        $('.pendingamt').html(parseInt(prevamt)- parseInt($('#advanced').val()));
                                    }
                                    {
                                         $('#pendingamt').html(parseInt(newpnd) - $('#advanced').val());
                                    }
                                });

                            $('.returned').on('keyup',function(){
                                var prvval=parseInt(redd);
                                var enterval=$(this).val();

                                if(newpnd==0)
                                    {
                                        $('.tanksremaining').html(parseInt(redd)-parseInt($(this).val()));
                                        if(parseInt(enterval)==prvval)
                                        {
                                            $(".btnclass").show();
                                        }
                                        if(parseInt(enterval)>prvval)
                                        {
                                            alert("Entered value is greater than remaining tanks");
                                            $(".btnclass").hide();
                                        }
                                    }

                                else
                                    {
                                    $('.tanksremaining').html(parseInt(newrmn)-parseInt($(this).val()));
                                    if(parseInt(enterval)==prvval)
                                    {
                                        $(".btnclass").show();
                                    }
                                    if(parseInt(enterval)>prvval)
                                    {
                                        alert("Entered value is greater than remaining tanks");
                                        $(".btnclass").hide();
                                    }
                                    }


                                });

                        })
                    });
                </script>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                  <div class="card w-100">
                    <div class="card-body p-4">
@php
$date=date('d/m/y');
@endphp
                        <h5 class="card-title fw-semibold mb-4">रजिस्टर  - {{ $date }}</h5>
                        <div class="table-responsive">
                    <a href="{{ url('/registerpdf') }}" target="_blank" class="btn btn-success closebtn" >प्रिंट PDF</a><br><br>Date : <input type="date" name="" required id="selectfrom" class="form-control w-auto  mx-3" id="">

<br>
                        <table id="registerdata" class="table text-nowrap mb-0 table-bordered align-middle text-center">
                          <thead class="text-dark fs-4">
                            <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">एन्ट्री नंबर</h6>
                             </th>
                             <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">प्रिंट बिल</h6>
                             </th>
                            <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">कस्टमर ID नंबर </h6>
                            </th>
                              <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">कस्टमरचे नाव</h6>
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
                                <h6 class="fw-semibold mb-0">पेमेंटचे करण्याचे पध्दत</h6>
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
                                <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">अपडेट</h6>
                             </th>
                             <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">डिलीट</h6>
                             </th>
                            </tr>
                          </thead>
                          <tbody id="selectdata">
                            @foreach ($data  as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td><a href="{{ url('fast',$d->id) }}" class="btn btn-danger closebtn" >प्रिंट बिल </a></td>                                    </td>
                                    <td>{{ $d->cid }}</td>
                                    <td>{{ $d->customer_name }}</td>
                                    <td>{{ $d->tanks_given_today }}</td>
                                    <td>{{ $d->tanks_price_per }}</td>
                                    <td>{{ $d->todays_total }}</td>
                                    <td>{{ $d->previous_total }}</td>
                                    <td>{{ $d->todays_total+$d->previous_total }}</td>
                                    <td>{{ $d->today_given_amt }}</td>
                                    <td>{{ $d->payment_method }}</td>
                                    <td>{{ $d->total }}</td>
                                    <td>{{ $d->previous_remaining_tanks }}</td>
                                    <td>{{ $d->tanks_given_today }}</td>
                                    <td>{{ $d->tanks_return_today }}</td>
                                    <td>{{ $d->tanks_remaining }}</td>
                                    <td>
                                        <form action="{{ route('TankDetails.edit',$d->id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-round px-3"><i class="icon-pencil"></i>अपडेट</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('TankDetails.destroy',$d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-round px-3"><i class="icon-trash"></i>डिलीट</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>

        var edit_base_url = "{{ route('TankDetails.edit', ':id') }}";
        var delete_base_url = "{{ route('TankDetails.destroy', ':id') }}";

        $(document).ready(function() {
            $('#selectfrom').on('change', function() {
                var fromdate = $('#selectfrom').val();
                var markup = "";

                $.ajax({
                    url: '/api/gettankdata2',
                    method: 'post',
                    data: {
                        fromdate: fromdate,
                    },
                    success: function(data) {
                        for (i = 0; i < data.length; i++) {
                            var edit_url = edit_base_url.replace(':id', data[i].tid);
                            var delete_url = delete_base_url.replace(':id', data[i].tid);

                            markup += "<tr><td>" + data[i].tid + "</td><td><a href='" + edit_url + "' class='btn btn-danger closebtn'>प्रिंट बिल </a></td><td>" + data[i].cid + "</td><td>" + data[i].customer_name + "</td><td>" + data[i].tanks_given_today + "</td><td>" + data[i].tanks_price_per + "</td><td>" + data[i].todays_total + "</td><td>" + data[i].previous_total + "</td><td>" + (parseInt(data[i].todays_total) + parseInt(data[i].previous_total)) + "</td><td>" + data[i].today_given_amt + "</td><td>" + data[i].payment_method + "</td><td>" + data[i].total + "</td><td>" + data[i].previous_remaining_tanks + "</td><td>" + data[i].tanks_given_today + "</td><td>" + data[i].tanks_return_today + "</td><td>" + data[i].tanks_remaining + "</td><td><form action='" + edit_url + "' method='get'><input type='hidden' name='_token' value='" + "{{ csrf_token() }}" + "'><button type='submit' class='btn btn-warning btn-round px-3'><i class='icon-pencil'></i>अपडेट</button></form></td><td><form action='" + delete_url + "' method='post'><input type='hidden' name='_token' value='" + "{{ csrf_token() }}" + "'><input type='hidden' name='_method' value='DELETE'><button type='submit' class='btn btn-danger btn-round px-3'><i class='icon-trash'></i>डिलीट</button></form></td></tr>";
                        }
                        $("#selectdata").html(markup);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
  @endsection


