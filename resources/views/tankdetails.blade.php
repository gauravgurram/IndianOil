@extends('header')

@section('content')

          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                {{-- <button id="myButton1" class="btn btn-primary">Refill Return</button> --}}
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
      <br>

      <div class="container-fluid">
        <div class="container-fluid"><br><br>
            <div class="container">
                <div class="form-label">
                    From :<input type="date" name="" required id="selectfrom" class="form-control w-auto  mx-3" id=""><br>
                    To : <input type="date" name=""  required id="selectto"  class="form-control w-auto  mx-3" id="">
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#selectfrom,#selectto').on('change',function(){
                            var fromdate=$('#selectfrom').val();
                            var todate=$('#selectto').val();

                            var markup="";
                            $.ajax({
                                    url:'/api/gettankdata',
                                    method:'post',
                                    data : {
                                        fromdate : fromdate,
                                        todate : todate
                                    },
                                    success:function(data)
                                    {
                                    console.log(data);
                                    for(i=0; i<data.length; i++)
                                    {
                                        markup+="<tr><td>"+data[i].cid+"</td><td>"+data[i].customer_name+"</td><td>"+data[i].givendate+"</td><td>"+data[i].billinvoice +"</td><td>"+data[i].payment_method+"</td><td>"+data[i].tanks_given_today+"</td><td>"+data[i].tanks_price_per+"</td><td>"+data[i].todays_total+"</td><td>"+data[i].previous_total+"</td><td>"+(parseInt(data[i].todays_total)+parseInt(data[i].previous_total))+"</td><td>"+data[i].today_given_amt+"</td><td>"+data[i].total+"</td><td>"+data[i].previous_remaining_tanks+"</td><td>"+data[i].tanks_given_today+"</td><td>"+data[i].tanks_return_today+"</td><td>"+data[i].tanks_remaining+"</td></tr>";
                                    }
                                    $("#selectdata").html(markup);

                                    },
                                    error:function(data)
                                    {
                                        console.log(data);
                                    }
                            });
                        })
                    });
                </script>
            </div>
            <br><br>


            <button class="btn btn-success" onclick="printDiv('printableArea')">प्रिंट चलन </button>

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
<br><br>

            <div class="row" >
                <div class="col-lg-12 d-flex align-items-stretch">
                  <div class="card w-100">
                    <div class="card-body p-4">
                      <h5 class="card-title fw-semibold mb-4">महिन्याचे स्टेटमेंट</h5>
                      <div class="table-responsive" id="printableArea">
                        <table class="table text-nowrap mb-0 table-bordered align-middle text-center" >
                          <thead class="text-dark fs-4">
                            <tr>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">कस्टमर ID नंबर </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">कस्टमरचे नाव</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">दिनांक</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">बिल नंबर</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">पेमेंट ऑप्शन</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">टाकी दिले </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">दर</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">एकूण रक्कम </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">मागील रक्कम येणे </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0"> टोटल </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">आजची जमा रक्कम </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">आजरोजी येणे रक्कम बाकी</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">मागील गॅस टाकी येणे </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">चालू गॅस टाकी</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">जमा गॅस टाकी </h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">चालू येण गॅस टाकी</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody id="selectdata">
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
  @endsection
