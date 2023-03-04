@extends('welcome')
@section('Shop Details')
    Shop Details Page
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                @if (Session('success'))
                    <div class="alert alert-success mt-4">
                        <span class="text-dark"><strong>Hey!</strong>{{ Session('success') }}</span>
                    </div>
                @endif

                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="container col-md-5">
                        <input name="pid" value="{{ $rd->id }}" style="border:none;" type="hidden">
                        <img src="{{ asset('uploads/products/' . $rd->productimage) }}" style="width:100%;height:550%;">
                    </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><b><input type="text" name="descriptions"
                            value="{{ $rd->descriptions }}" style="border:none;"></b></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3>&#x20B9<input type="text" id="price" name="offerprice" value="{{ $rd->offerprice }}"
                        style="border:none; width:20%;"> &nbsp;&nbsp;<del>&#x20B9&nbsp;{{ $rd->oldprice }}</del></h3>

                <p class="mb-4">{{ $rd->productname }}

                </p>
                <div class="d-flex mb-3">

                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>

                </div>


                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>

                </div>
                <h3>Total : <label id="total">&#x20B9&nbsp;{{ $rd->offerprice }}</label></h3>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <input type="number" id="qty" name="qty" class="form-control bg-secondary text-center"
                        min="1" max="50" value="1" onchange="subtot()"
                        style="width:10%;">&nbsp;&nbsp;



                    <input type="submit" class="btn btn-md text-dark bg-primary p-2" value="Add To Cart">

                </div>
                </form>
                {{-- <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div> --}}




            </div>
        </div>

    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->

    <!-- Products End -->
@endsection
