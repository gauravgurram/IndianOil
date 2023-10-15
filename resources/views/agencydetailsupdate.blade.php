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

      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">अपडेट एजन्सि डिटेल्स </h5>
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="{{ route('Agency.update',$data->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">एजन्सि कडचे टाक्या किती आहेत</label>
                      <input type="text" class="form-control" name="noofowntanks" id="exampleInputEmail1" value={{ $data->owntanks }}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">रिकाम्या टाक्या </label>
                        <input type="text" class="form-control" name="emptytanks" id="exampleInputEmail1" value={{ $data->empty_tanks }} >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">टोटल टाक्या </label>
                        <input type="text" class="form-control" name="totaltanks" id="exampleInputEmail1" value={{ $data->total }} >
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
