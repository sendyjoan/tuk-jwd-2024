<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hello, {{ Auth::user()->name }}!</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Welcome to Our Homepage!</h4>
            </div>
            <div class="card-body">
                We’re delighted to have you here. This is the heart of our website, where you can discover the latest updates, explore our offerings, and learn more about our mission. Navigate through our sections to find out how we can serve you better. Whether you're a returning visitor or here for the first time, this homepage is your gateway to everything we have to offer. Enjoy your stay and feel free to reach out if you need any assistance!
            </div>
        </div>
    </section>
</div>