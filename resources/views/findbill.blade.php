@extends('header')

@section('content')
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <button class="btn btn-primary">{{ session('username') }}</button>
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
      <br><br><br><br>


      <div class="container-fluid" >
        <div class="container-fluid">
            <div class="container">
                <br><br>
                    <label for="exampleInputEmail1" class="form-label">इनवॉइस नंबर </label>
                    <input type="text" name="invoiceno" id="invoiceno">
                    <br><br>

                    <input type="submit" class="btn btn-success" id="find" value="Find">

                <br><br>

                <div class="row" id="printableArea">
                    <div class="col-lg-5 d-flex align-items-stretch m-auto" >
                      <div class="card w-100">
                        <div class="card-body p-4">
                          <div class="table-responsive">
                            <h1 id="cid"></h1>
                            <img src="{{ asset('backend/assets/images/logos/Indian_Oil_Corporation-Logo-removebg.png')}}" width="150" alt="" />
                            <img src="{{ asset('backend/assets/images/logos/titleimg.png')}}" width="240" alt="" />
                            <table class="table text-nowrap mb-0 align-middle"  >
                                <br>
                                <h2 class="card-title fw-semibold mb-4 text-center" id="customername">कस्टमरचे नाव</h2>

                                <tr>
                                    <th class="border-bottom-0">दिनांक </th>
                                    <td id="date"></td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">टाकी दिले  </th>
                                    <td id="tankgiven"></td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">दर </th>
                                    <td id="price"></td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">आजच टोटल  </th>
                                    <td id="todaystotal"></td>
                                </tr>

                                <tr>
                                    <th class="border-bottom-0">मागील रक्कम  </th>
                                    <td id="previousamt"></td>
                                </tr>

                                <tr>
                                    <th class="border-bottom-0">जमा रक्कम  </th>
                                    <td id="advance"></td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">टाकी परत दिले  </th>
                                    <td id="tankreturn"></td>
                                </tr>
                                <tr>
                                    <th class="border-bottom-0">शिल्लक टाक्या  </th>
                                    <td id="remainingtanks"></td>
                                </tr>
                            </table>
                            <button class="btn btn-success" onclick="printDiv('printableArea')">प्रिंट चलन </button>
                          </div>

                        </div>
                        <a href="bill2" id="recipt2" target="_blank" class="btn btn-success closebtn" >प्रिंट बिल </a>
                    </div>
                </div>
            </div>
                  <br><br>
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

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#find').on('click',function(){

                            var invoiceno=parseInt($("#invoiceno").val());

                            $.ajax({
                                    url:'/api/searchdata3',
                                    method:'post',
                                    data : {
                                        invoiceno : invoiceno,
                                    },
                                    success:function(data)
                                    {
                                    console.log(data);

                                    var dynamicURL = '/bill2/' + data[0].billinvoice;

                                    console.log(data[0].billinvoice)

                                    $('#recipt2').attr("href",dynamicURL) ;

                                    $("#customername").html("<h2 class='text-center'><b><u>"+data[0].customer_name+"</u></b></h2>");

                                     for(i=0; i<data.length; i++)
                                     {
                                        $("#date").html(data[i].givendate);
                                        $("#tankgiven").html(data[i].tanks_given_today);
                                        $("#price").html(data[i].tanks_price_per);
                                        $("#todaystotal").html(data[i].todays_total);
                                        $("#previousamt").html(data[i].previous_total);
                                        $("#advance").html("<b>"+data[i].today_given_amt+"</b>");
                                        $("#tankreturn").html(data[i].tanks_return_today);
                                        $("#remainingtanks").html(data[i].tanks_remaining);
                                    }
                                    },
                                    error:function(data)
                                    {
                                        console.log(data);
                                        alert('No Bill Found');
                                    }
                            });
                        })
                    });
                </script>
            </div>
        </div>
      </div>
    </div>

  @endsection
