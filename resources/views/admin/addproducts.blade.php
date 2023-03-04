<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>


    <div class="container mt-5 bg-white p-4">
        <h2 class="mt-3 text-center" style="font-size:15px">Add Your Products
        </h2>
        <hr class="border border-2 w-50 mx-auto">
        <div class="row">
            <div class="col-md-4 mt-5">
                <ul>
                    <li class="list-unstyled"><a href="/addproducts" class="text-dark text-decoration-none">Add
                            Products</a></li>
                    <li class="list-unstyled"><a href="/manageproducts" class="text-dark text-decoration-none">Manage
                            Products</a></li>
                    <li class="list-unstyled"><a href="/addproducts" class="text-dark text-decoration-none">Add
                            Gallery</a></li>
                    <li class="list-unstyled"><a href="/manageproducts" class="text-dark text-decoration-none">Manage
                            Gallery</a></li>

                </ul>
            </div>
            <div class="col-md-8 p-4">
                <!-- success flash message -->
                @if (Session('success'))
                    <div class="alert alert-success">
                        <span class="text-dark"><strong>Hey !</strong>{{ session('success') }}</span>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label>Select Category</label>
                        <select name="categoryname" placeholder="Select Category" class="form-control">
                            <option value="">-Select Category-</option>

                            @foreach ($category as $category1)
                                @if ($ed->categoryid == $category1->id)
                                    <option value="{{ $ed->categoryid }}" selected>{{ $category1->categoryname }}
                                    </option>
                                @else
                                    <option value="{{ $category1->id }}">{{ $category1->categoryname }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label>Select Subcategory</label>
                        <select name="subcategoryname" placeholder="Select Subcategory" class="form-control">
                            <option value="">-Select Subcategory-</option>
                            @foreach ($subcategory as $subcategory1)
                                @if ($ed->subcategoryid == $subcategory1->id)
                                    <option value="{{ $ed->subcategoryid }}" selected>
                                        {{ $subcategory1->subcategoryname }}</option>
                                @else
                                    <option value="{{ $subcategory1->id }}">{{ $subcategory1->subcategoryname }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">

                        <input type="text" name="productname"
                            placeholder="Enter
                            Productname*" class="form-control shadow-lg">
                    </div>
                    <div class="form-group mt-3">

                        <input type="file" name="productimage" class="form-control shadow-lg">
                    </div>
                    <div class="form-group mt-3">

                        <input type="text" name="qty" placeholder="Enter Qty*" class="form-control shadow-lg">
                    </div>
                    <div class="form-group mt-3">

                        <input type="text" name="oldprice" placeholder="Enter
                            Oldprice*"
                            class="form-control shadow-lg">
                    </div>
                    <div class="form-group mt-3">

                        <input type="text" name="offerprice"
                            placeholder="Enter
                            Offerprice*" class="form-control shadow-lg">
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="descriptions" placeholder="Enter
                            Descriptions *"
                            class="form-control shadow-lg"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="addproducts" value="Add
                            Products"
                            class="btn btn-sm btn-primary bg-primary">
                        <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-danger bg-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>





</x-app-layout>
