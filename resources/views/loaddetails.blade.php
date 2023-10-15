@extends('header')

@section('content')

<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
      <button id="myButton" class="btn btn-primary">लोड अॅड करा</button>
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

<br><br><br><br>

   <!--  Header End -->
   <div class="container-fluid">
    <div class="container-fluid">

    <div id="myDiv" style="display: none;">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">टाक्या अॅड करा </h5>
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('LoadDetails.store') }}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">कंपनी कडून आलेले टाक्या </label>
                  <input type="text" class="form-control" name="newload" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">कंपनीला परत दिलेले टाक्या </label>
                    <input type="text" class="form-control" name="returnload" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">लोड डिटेल्स </h5>
                    <div class="table-responsive">
                        <table id="registerdata" class="table text-nowrap mb-0 align-middle text-center">
                        {{-- <a href="{{ url('/registerpdf') }}" target="_blank" class="btn btn-success closebtn" >Download PDF</a> --}}
                      <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">एंट्री  ID</h6>
                            </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">लोड दिनांक </h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">कंपनी कडून आलेले टाक्या</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">कंपनीला परत दिलेले टाक्या</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($load  as $d)
                             <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->loaddate }}</td>
                                <td>{{ $d->new_tanks_load }}</td>
                                <td>{{ $d->tanks_returnto_company}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
