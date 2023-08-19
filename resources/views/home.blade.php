<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/puse-icons-feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/daterangepicker/daterangepicker.css') }}">
    @yield('plugin-css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/my.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" /> </head>
    <title>Rio Sports</title>
</head>
<body class="body">
    <img src="{{ asset('assets/images/bg-t.svg') }}" alt="" class="bg-t">
    <img src="{{ asset('assets/images/bg-b.svg') }}" alt="" class="bg-b">
    <div class="d-flex justify-content-center main-div">
        <div class="col-md-10">
            <div class="card home-div">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{ asset('assets/images/menu.svg') }}" alt="">
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" width="80" height="80">
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <h2 class="home-main-header">Stay in the Game: Live Streams, Match Results, and Breaking News</h2>
                        <p class="home-main-text mt-5">Our app keeps you ahead of the curve with breaking news, analysis, and insights that fuel your passion for the beautiful game. Don't just watch, immerse yourself in the heart of football excitement with our all-in-one app!</p>
                        <div class="mt-5">
                            <a href="https://bit.ly/47uDnuB">
                                <img src="{{ asset('assets/images/android.svg') }}" alt="" width="170">
                            </a>
                            <a href="https://apps.apple.com/us/app/rio-sports/id6460858080">
                                <img src="{{ asset('assets/images/ios.svg') }}" alt="" width="170" class="ml-3">    
                            </a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/phone.svg') }}" alt="" width="550" height="550" class="phone">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>