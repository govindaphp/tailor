<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ url('/public') }}/web/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public') }}/web/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('/public') }}/web/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('/public') }}/web/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      @include('front.user.layouts.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('front.user.layouts.sidebar')  
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
          @include('front.user.layouts.footer')
  </body>
</html>