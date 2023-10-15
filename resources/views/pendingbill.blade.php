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
      <div class="container-fluid">
        <div class="container-fluid">
            <div class="container">
                <button class="btn btn-success" onclick="printDiv('printableArea')">प्रिंट</button><br><br>
            <div class="row">
                <div class="col-lg-10 d-flex align-items-stretch">
                  <div class="card w-100">
                    <div class="card-body p-4">
                      <h5 class="card-title fw-semibold mb-4">पेंडिंग बील</h5>
                      <div class="table-responsive" id="printableArea">
                        <table class="table text-nowrap table-bordered mb-0 align-middle text-center">
                          <thead class="text-dark fs-4">
                            <tr>
                              <th class="border-bottom-0 col-1">
                                    <h6 class="fw-semibold mb-0">कस्टमर ID नंबर </h6>
                              </th>
                              <th class="border-bottom-0 col-2">
                                <h6 class="fw-semibold mb-0">कस्टमरचे नाव</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">कस्टमरचे फोन नंबर</h6>
                              </th>
                              <th class="border-bottom-0 col-1">
                                <h6 class="fw-semibold mb-0">टाकी येणे  </h6>
                              </th>
                              <th class="border-bottom-0 ">
                                <h6 class="fw-semibold mb-0">रक्कम येणे</h6>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach ($arr as $e)
                            <tr>
                                <td>{{ $e->id }}</td>
                                <td>{{ $e->customer_name }}</td>
                                <td>{{ $e->mobile }}</td>
                                <td>{{ $e->tanks_remaining }}</td>
                                <td>{{ $e->total }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
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
              </div>
        </div>
      </div>

      @endsection
