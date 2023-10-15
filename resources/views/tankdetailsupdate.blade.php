
@extends('header')

@section('content')

          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
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
      <br><br><br><br>

      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-semibold mb-4">कस्टमर ला गॅस टाकी देणे व घेणे अपडेट </h5>
                  <div class="card">
                    <div class="card-body">
                    <form method="POST" action="{{ route('TankDetails.update',$data->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">कस्टमर ID</label>
                        <input type="hidden" class="form-control" id="supply" name="customerid" value={{ $data->cid }}  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">गॅस टाकी दिले </label>
                      <input type="text" class="form-control" id="supply" name="tanksgiventoday" value={{ $data->tanks_given_today }} aria-describedby="emailHelp">
                    </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">दर</label>
                          <input type="text" class="form-control" id="price" name="tankprice" value={{ $data->tanks_price_per }} aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">आजची जमा रक्कम </label>
                          <input type="text" class="form-control" id="advanced"  name="advanceamt" value={{ $data->today_given_amt }}   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">पेमेंटचे करण्याचे पध्दत </label>
                          <select name="paymentmode" class="form-select">
                              <option value={{ $data->payment_method }}>{{ $data->payment_method }}</option>
                              <option value="Cash">Cash </option>
                              <option value="Online">Online </option>
                              <option value="Check">Check </option>
                          </select>
                      </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">गॅस टाकी रिटर्न </label>
                            <input type="text" class="form-control returned" id="returned" name="tanksreturntoday" value={{ $data->tanks_return_today}} aria-describedby="emailHelp">
                        </div>
                      <button type="submit" class="btn btn-primary btnclass" id="btnid">Submit</button>
                        <h1 id="sam"></h1>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
@endsection


