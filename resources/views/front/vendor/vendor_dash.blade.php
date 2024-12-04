@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Vendor-Dashboard</h1>
        </div>
    </div>
</div>



   

<div class="container-fluid page-body-wrapper vendor-dasboard">
@include('front.vendor.vendor_sidebar')




<div class="main-panel">
          <div class="content-wrapper">
            <h3>Dashboard</h3>
            <div class="row card-vendor-inner">
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body one">
                        <p class="text-one">Today's Sales</p>
                        <p class="fs-30">4006</p>
                        <!--p-- class="days-text">10.00% (30 days)</!--p-->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body two">
                        <p class="text-one">Total Orders</p>
                        <p class="fs-30 mb-2">61344</p>
                        <!--p-- class="days-text">22.00% (30 days)</!--p-->
                      </div>
                    </div>
                  </div>


                      <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body three">
                        <p class="text-one">Today's Order</p>
                        <p class="fs-30 mb-2">61344</p>
                        <!--p-- class="days-text">22.00% (30 days)</!--p-->
                      </div>
                    </div>
                  </div>



                  <!--div-- class="col-md-3 mb-4 stretch-card transparent">
                      <div class="card card-dark-blue">
                        <div class="card-body four">
                          <p class="text-one">Pending Order</p>
                          <p class="fs-30 mb-2">61344</p>
                          <p-- class="days-text">22.00% (30 days)</!--p>
                        </div>
                    </div>
                  </!--div-->
                  <div class="col-md-3 mb-4 stretch-card transparent">
                      <div class="card card-dark-blue">
                        <div class="card-body four">
                          <p class="text-one">Total Products</p>
                          <p class="fs-30 mb-2">61344</p>
                          <!--p-- class="days-text">22.00% (30 days)</!--p-->
                        </div>
                    </div>
                  </div>
                </div>         



  <div class="row order-details">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Order Details</p>
                    <!--p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</!--p-->
                    <div class="d-flex flex-wrap order-value">
                      <div class="me-5 mt-3">
                        <p class="text-muted order-value-text">Order value</p>
                        <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                      </div>
                      <div class="me-5 mt-3">
                        <p class="text-muted order-value-text">Orders</p>
                        <h3 class="text-primary fs-30 font-weight-medium">1403</h3>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted order-value-text">Pending Order</p>
                        <h3 class="text-primary fs-30 font-weight-medium">340</h3>
                      </div>
                      <!--div-- class="me-5 mt-3">
                        <p class="text-muted order-value-text">Users</p>
                        <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                      </!--div-->
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="card-title">Sales Report</p>
                    </div>
                    <!--p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</!--p-->
                    <div id="sales-chart-legend" class="chartjs-legend mt-4 mb-2"></div>
                    <canvas id="sales-chart"></canvas>
                  </div>
                </div>
              </div>
            </div>


       <div class="row top-products">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title mb-0">Recent Orders</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Search Engine Marketing</td>
                            <td class="font-weight-bold">$362</td>
                            <td>21 Sep 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">Completed</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Search Engine Optimization</td>
                            <td class="font-weight-bold">$116</td>
                            <td>13 Jun 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">Completed</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Display Advertising</td>
                            <td class="font-weight-bold">$551</td>
                            <td>28 Sep 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Pay Per Click Advertising</td>
                            <td class="font-weight-bold">$523</td>
                            <td>30 Jun 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>E-Mail Marketing</td>
                            <td class="font-weight-bold">$781</td>
                            <td>01 Nov 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-danger">Cancelled</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Referral Marketing</td>
                            <td class="font-weight-bold">$283</td>
                            <td>20 Mar 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Social media marketing</td>
                            <td class="font-weight-bold">$897</td>
                            <td>26 Oct 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">Completed</div>
                            </td>
                          </tr>
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




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="/resources/chart.js/chart.umd.js"></script>
 <script src="/resources/js/off-canvas.js"></script>



<script>
    const ctx = document.getElementById('sales-chart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Votes',
                data: [12, 19, 3, 5, 2, 3, 20, 18, 11, 28, 8, 9],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('sales-chart').getContext('2d');
        new Chart(ctx, { /* Chart configuration */ });
    });
</script>



@endsection
