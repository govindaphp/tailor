<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{url('vendorsDasboard')}}">
        <i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('ProfileSetting')}}" >
        <i class="fa fa-user"></i>
        <span class="menu-title">My Profile</span>
        <i class="menu-arrow"></i>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables-menu" aria-expanded="false" aria-controls="tables-menu">
            <i class="fas fa-tshirt" aria-hidden="true"></i>
            <span class="menu-title">Products</span>
            <i class="menu-arrow fa fa-chevron-down"></i>
        </a>
        <!-- Dropdown items -->
        <div class="collapse" id="tables-menu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('vendorProduct')}}">View Product</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="form-elements">
        <i class="fa fa-shopping-cart"></i>
        <span class="menu-title">Orders</span>
        <i class="menu-arrow"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="charts">
        <i class="fas fa-comment" aria-hidden="true"></i>
        <span class="menu-title">Message</span>
        <i class="menu-arrow"></i>
      </a>

    </li>
    


    <!--li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>  
    </!--li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
 
    </li>

    <li-- class="nav-item">
      <a class="nav-link" href="../../../docs/documentation.html">
        <i class="fa fa-th" aria-hidden="true"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li-->
  </ul>
</nav>