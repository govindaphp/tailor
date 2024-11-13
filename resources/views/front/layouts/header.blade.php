<div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Growers cider</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Fresh grapes</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Heinz tomato ketchup</h6>
                <small class="text-body-secondary">Brief description</small>
              </div>
              <span class="text-body-secondary">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
  
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </div>
      </div>
    </div>
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
      <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Search</span>
          </h4>
          <form role="search" action="index.html" method="get" class="navform d-flex mt-3 gap-0">
            <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="search by tailor specialty, fabric type, etc." aria-label="search by tailor specialty, fabric type, etc.">
            <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <header>
	
	<div class="container-fluid topbar bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-0 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Address will goes here</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 btns-set d-inline-flex align-items-center py-0 me-1">
                    <a href="#">Sign Up <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="h-100 btns-set d-inline-flex align-items-center">
                    <a href="#">Login <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
      <div class="container-fluid center-row">
        <div class="row py-3 border-bottom">
          
          <div class="col-sm-4 col-lg-3 text-center mob--left text-sm-start">
            <div class="main-logo">
              <a href="{{ url('/') }}">
                <img src="{{ url('/public') }}/front_assets/images/logo-new.png" alt="logo" class="img-fluid">
              </a>
            </div>
          </div>
          
          <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-6 d-none searchbar d-lg-block">
            <div class="hero__search__form">
                            <form action="#">
                                
                                <input type="text" placeholder="search by tailor specialty, fabric type, etc.">
                                <button type="submit" class="site-btn">Search</button>
                            </form>
                        </div>
          </div>
          
          <div class="col-sm-8 col-lg-3 d-flex justify-content-end mob-right gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">

            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-end">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">      
              
                  <ul class="navbar-nav justify-content-end desk-hide menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="#" class="nav-link">Home <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link">Browse Tailors <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Browse Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Designs <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                  </ul>
				  
				  <ul class="d-flex list-unstyled m-2">
					<li><a href="#"><i class="bi bi-bell"></i></a></li>
                    <li class="cart"><a href="#"><i class="bi bi-bag"></i> <span>3</span></a></li>
					  <li class="d-lg-none">
						<a href="#" class="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
						  <i class="bi bi-search"></i>
						</a>
					  </li>
					</ul>
                
                </div>
				
				

              </div>
			  </nav>

          </div>

        </div>
      </div>
      <div class="container-fluid btm-row">
        <div class="row">
          <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-end">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">      
              
                  <ul class="navbar-nav justify-content-end  menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="#" class="nav-link">Home <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link">Browse Tailors <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Browse Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Designs <i class="bi bi-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Explore Fabrics <i class="bi bi-chevron-down"></i></a>
                    </li>
                  </ul>
				  
				  <ul class="d-flex d--none list-unstyled mt-0">
					<li><a href="#"><i class="bi bi-bell"></i></a></li>
                    <li class="cart"><a href="#"><i class="bi bi-bag"></i> <span>3</span></a></li>
					  <li class="d-lg-none">
						<a href="#" class="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
						  <i class="bi bi-search"></i>
						</a>
					  </li>
					</ul>
                
                </div>
				
				

              </div>
			  </nav>
			  
			  <div class="info-head">
				<div class="h-100 d-inline-flex align-items-center py-0">
                    <small><i class="bi bi-telephone"></i> (012) 345-6789</small>
                </div>
			  </div>
          </div>
        </div>
      </div>
    </header>