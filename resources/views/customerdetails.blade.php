<?php
use App\Models\TanksData;
?>
@extends('header')

@section('content')

          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <button id="myButton" class="btn btn-primary">नवीन कस्टमर अॅड करा</button>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('backend/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
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

      <script>
        // Add an event listener to the button
        document.getElementById("myButton").addEventListener("click", function() {
          // Show or hide the div based on its current state
          var div = document.getElementById("myDiv");
          div.style.display = (div.style.display === "none") ? "block" : "none";
        });
      </script>
      <br><br><br>


      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">

        <div id="myDiv" style="display: none;">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">अॅड कस्टमर डिटेल्स </h5>
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="{{ route('CustomerDetails.store') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">कस्टमरचे नाव </label>
                      <input type="text" class="form-control" name="custname" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">पत्ता </label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">मोबाइल नंबर </label>
                        <input type="text" class="form-control" name="mobile" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">GST नंबर </label>
                        <input type="text" class="form-control" name="gstno" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">आधार / पॅन कार्ड नंबर  </label>
                        <input type="text" class="form-control" name="aadhar" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">डिपॉजिट </label>
                        <input type="text" class="form-control" name="deposit" id="exampleInputEmail1" required aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
            </div>
<!--Model Code-->

<div class="container mt-3">
  </div>
  <!-- The Modal -->
  <div class="modal" id="myModal3">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">हिस्टरी</h4>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}

    @foreach ($data as $t)
        @php
            $ccid=$t->id;
        @endphp
    @endforeach

          <a href="#" id="linktoc" target="_blank" class="btn btn-success closebtn" >प्रिंट स्टेटमेंट</a>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                  <div class="card w-100">
                    <div class="card-body p-4">
                      <h5 class="card-title fw-semibold mb-4" id="customername">ट्रानजॅकश्न</h5>
                      <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle table-bordered text-center">
                          <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">कस्टमर ID नंबर </h6>
                                  </th>
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">दिनांक</h6>
                                  </th>
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">कस्टमरचे नाव</h6>
                                  </th>
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">बिल नंबर</h6>
                                  </th>
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">बिल प्रिंट</h6>
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
                          </thead>
                          <tbody id="modeltbldata">
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5 id="remainingtanks"><b>एकूण गॅस टाकी येणे  : 0</b></h5>
    <h5 id="billamount"><b>एकूण बिल : 0</b></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger closebtn" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!--Model end -->
          <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4">कस्टमर डिटेल्स</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap table-bordered mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">ID</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">कस्टमरचे नाव</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">पत्ता </h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">मोबईल नंबर </h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">GST नंबर </h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">डिपॉजिट </h6>
                          </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">शो हिस्टरी</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">अपडेट </h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $t)
                        <tr>
                            @php
                                $custid=$t->id;
                            @endphp
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->customer_name }}</td>
                            <td>{{ $t->address }}</td>
                            <td>{{ $t->mobile}}</td>
                            <td>{{ $t->gstno}}</td>
                            <td>{{ $t->deposit}}</td>
                            <td>
                                <button type="button"  class="btn btn-info btn-round px-3 modelbtn"  value="{{ $t->id }}">शो हिस्टरी </button>
                            </td>
                            <td>
                            <form action="{{ route('CustomerDetails.edit',$t->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-round px-3"><i class="icon-pencil"></i> अपडेट </button>
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
$(document).ready(function(){
    $(".modelbtn").on("click",function(){
        var tt=$(this).val();
        $("#myModal3").show();
        var markup="";
        $.ajax({
            url:'/api/getcustdata/'+tt,
            method:'get',
            success:function(data)
            {
                if (data.length === 0) {
                    // Handle empty data here
                    console.log("No data available");
                    $("#modeltbldata").html("");
                    $('#remainingtanks').html("");
                    $('#billamount').html("");
                    return;
                }

               console.log(data.length);
               $('#customername').html("कस्टमरचे नाव : "+data[0].customer_name)
                $cusid=data[0].cid;
                $advance=data[0].today_given_amt;

                var dynamicURL = '/createPDF/' + data[0].cid;
                var temp=0;
                $('#linktoc').attr("href",dynamicURL) ;

                for(i=0; i<data.length; i++)
                {
                    temp=data[i].billinvoice;
                    markup+="<tr><td>"+data[i].cid+"</td><td>"+data[i].givendate+"</td><td>"+data[i].customer_name+"</td><td>"+data[i].billinvoice+"</td><td><a href='fast2/"+temp+"' class='btn btn-success'>प्रिंट बिल </a></td><td>"+data[i].payment_method+"</td><td>"+data[i].tanks_given_today+"</td><td>"+data[i].tanks_price_per+"</td><td>"+data[i].todays_total+"</td><td>"+data[i].previous_total+"</td><td>"+(parseInt(data[i].todays_total)+parseInt(data[i].previous_total))+"</td><td>"+data[i].today_given_amt+"</td><td>"+data[i].total+"</td><td>"+data[i].previous_remaining_tanks+"</td><td>"+data[i].tanks_given_today+"</td><td>"+data[i].tanks_return_today+"</td><td>"+data[i].tanks_remaining+"</td></tr>";

                    $('#remainingtanks').html("<h5><b>एकूण गॅस टाकी येणे  : &emsp;&emsp;&nbsp;&nbsp;"+data[i].tanks_remaining+"</b></h5>");
                    $('#billamount').html("<h5><b>एकूण बिल : &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;"+data[i].total+" /-</b></h5>");
                    $totalamt=data[i].total;
                }

                $("#modeltbldata").html(markup);

            },
            error:function(data)
            {
                console.log(data);
            }
        });

    });
    $(".closebtn").on("click",function(){
        $("#myModal3").hide();
    })
})
</script>

@endsection
