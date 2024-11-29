@extends('front.layouts.layout')

@section('content')


<div class="banner-tailors">
<div class="container browse-tailors">
  <div class="row browse-content">
    <h1 class="text-white">Browse Fabrics</h1>
  </div>
</div>
</div>

<div class="container py-5">

	<div class="row g-4 fabrics-container">
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/ankara.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Ankara</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/cotton.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Cotton</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/denim.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Denim</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/silk.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Silk</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/velvet.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Velvet</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/rayon.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Rayon</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/wool.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Wool</a>
                        </div>
                    </div>
            </div>
        </div>
		<div class="col-lg-3 col-md-6 fabrics-item">
            <div class="position-relative rounded overflow-hidden">
                <div class="fabrics-image"><img class="img-fluid w-100" src="{{ url('/public') }}/front_assets/images/corduroy.jpg" alt=""></div>
                    <div class="fabrics-overlay">
                        <div class="mt-auto title-fab">
                            <a class="h5 d-block text-white mt-1 mb-0 hover-effect" href="{{ route('febricMarchent') }}">Corduroy</a>
                        </div>
                    </div>
            </div>
        </div>
	</div>
</div>


@endsection