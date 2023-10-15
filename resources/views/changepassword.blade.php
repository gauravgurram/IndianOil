<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saki Gas Agency</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('backend/assets/images/logos/Indian_Oil_Corporation-Logo-removebg.png')}}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css')}}" />
</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <img src="{{ asset('backend/assets/images/logos/Indian_Oil_Corporation-Logo-removebg.png')}}" width="230" alt="" />
                    <br><img src="{{ asset('backend/assets/images/logos/titleimg.png')}}" width="240" alt="" />
                </a>
                <form method="get" action="{{ url('newpassword') }}">
                    @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">नवीन पासवर्ड टाका</label>
                    <input type="text" name="newpass" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">सेव करा</button>
                  <div class="d-flex align-items-center justify-content-center">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
