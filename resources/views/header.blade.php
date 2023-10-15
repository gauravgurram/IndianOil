<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saki Gas Agency</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('backend/assets/images/logos/Indian_Oil_Corporation-Logo-removebg.png')}}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .textcenter
    {
        text-align: center;
    }
</style>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            <img src="{{ asset('backend/assets/images/logos/indianlogo.png')}}" width="230" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">

          <ul id="sidebarnav">

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">कस्टमर डिटेल्स </span>
            </li>



            <li class="sidebar-item">
                <a class="sidebar-link" href="CustomerDetails" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">कस्टमर डिटेल्स </span>
                </a>
              </li>


            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="CustomerSearch" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">पेंडिंग बिल सर्च </span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="findbill" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">बिल सर्च </span>
                </a>
            </li> --}}


            <li class="sidebar-item">
                <a class="sidebar-link" href="pendingbill" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">पेंडिंग बिल</span>
                </a>
            </li>


        </ul>

        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">टक्याचे डेटलीस </span>
              </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="TankDetails" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">महिन्याचे स्टेटमेंट </span>
              </a>
            </li>

              <li class="sidebar-item">
              <a class="sidebar-link" href="Register" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">रजिस्टर </span>
              </a>
            </li>
        </ul>

        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">एजन्सि डिटेल्स </span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="Agency" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">एजन्सि कडचे टाक्या </span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="LoadDetails" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">लोड डिटेल्स </span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="login1" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">नवीन अडमिन रजिस्ट्रेशन</span>
                </a>
              </li>

          </ul>
          <ul id="sidebarnav">
              <li class="sidebar-item">
                <a class="sidebar-link" href="logout" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">लॅगआउट </span>
                </a>
              </li>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

   <!--  Main wrapper -->
   <div class="body-wrapper">
    <!--  Header Start -->


    <header class="app-header">
        <div class="d-flex justify-content-center"><br>
            <img src="{{ asset('backend/assets/images/logos/titleimg.png')}}" width="270px" alt=""/>
        </div>

          <nav class="navbar navbar-expand-lg navbar-light">
              {{-- <b>Date : <span id="date-time"></span> <br>Time : <span id="timeDisplay"></span></b> --}}
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
            </ul>
      {{-- <script>
        function updateTime() {
      const currentTime = new Date();
      let hours = currentTime.getHours();
      let ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12 || 12; // Convert to 12-hour format
      const minutes = String(currentTime.getMinutes()).padStart(2, '0');
      const seconds = String(currentTime.getSeconds()).padStart(2, '0');

      const formattedTime = `${hours}:${minutes}:${seconds} ${ampm}`;
      document.getElementById('timeDisplay').textContent = formattedTime;

    const dt = new Date();
    document.getElementById('date-time').innerHTML=dt.getDate()+"/"+dt.getMonth()+"/"+dt.getFullYear();
    }
    setInterval(updateTime, 1000);
        </script> --}}

{{-- <div>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {pageLanguage: 'en'},
                'google_translate_element'
            );
        }
    </script>

    <script type="text/javascript"
            src=
"https://translate.google.com/translate_a/element.js?
cb=googleTranslateElementInit">
    </script>
</div> --}}

@yield('content')
</div>

  <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('backend/assets/js/dashboard.js')}}"></script>
</body>
</html>
