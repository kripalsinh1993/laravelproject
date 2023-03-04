@extends('layout')

@section('title_name')
    Shopping Cart page
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->





    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">

                @if (Session('del'))
                    <div class="alert alert-danger">
                        <strong class="text-dark">Hey!</strong>{{ session('del') }}
                    </div>
                @endif

                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Product Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($data as $row)
                            <form method="post">
                                @csrf

                                <tr>
                                    <td class="align-middle"><img
                                            src="{{ asset('uploads/products/' . $row->productimage) }}" alt=""
                                            style="width: 50px;"></td>
                                    <td class="align-middle" id="descriptions">{{ $row->descriptions }}</td>
                                    <td class="align-middle" id="price">{{ $row->offerprice }}</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 60px;">
                                            {{-- <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div> --}}
                                            <input type="number" id="qty" name="qty"
                                                class="form-control bg-secondary text-center" min="1" max="50"
                                                value="1" onchange="subtot(this,{{ $row->id }})">
                                            {{-- <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button> --}}
                                        </div>
            </div>
            </td>
            <input type="hidden" value="{{ $row->offerprice }}" class="total_input" name="total_input{{ $row->id }}">
            <td class="align-middle total_td" id="total_td_{{ $row->id }}">
                {{ $row->offerprice }}
            </td>

            <td class="align-middle"><a href='{{ URL('/showcart/' . $row->id) }}'>
                    <i class="bi bi-trash3-fill  text-danger"></i></a></td>
            </tr>
            </form>
            @endforeach
            </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium show_subtotal_label">${{ number_format($data->sum('offerprice'), 2) }}
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold show_total_label">
                            ${{ number_format($data->sum('offerprice') + 10, 2) }}</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Cart End -->

    <script src="{{ asset('assets/js/total.js') }}"></script>
@endsection
