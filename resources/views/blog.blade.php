@extends('welcome')
@section('title_name')
    Blog Page
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Blog</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Blog</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Gallery Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            @foreach ($blog as $rows)
                <div class="col-lg-12 col-md-12 col-sm-12 pb-1">
                    <div class="card  border-0 mb-4">
                        <div class="card-header bg-primary position-relative overflow-hidden border p-3">
                            <h3 class="text-truncate mb-3">{{ $rows->blogstitle }}</h3>
                        </div>
                        <div class="card-body border-left border-right text-center">
                            <p class="card-text">{{ $rows->descriptions }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
@endsection
