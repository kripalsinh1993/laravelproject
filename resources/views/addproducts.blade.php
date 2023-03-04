<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5 bg-white p-5">
        <h3 class="text-center">Add Your Products</h3>
        <hr class="border border-2 w-50 mx-auto">
        <div class="row">
            <div class="col-md-4">
                <ul>

                    <li><a href="/addproducts">Add Products</a></li>
                    <li><a href="/managproducts">Manage Products</a></li>

                </ul>
            </div>

            <div class="col-md-7">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session('success'))
                    <div class="alert alert-success">

                        <span class="text-dark">Hey {{ session('success') }} </span>

                    </div>
                @endif
                <form method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-3">
                        <label>Select Category</label>
                        <select name="categoryname" placeholder="select Category" class="form-control">
                            <option value="">-select Category-</option>
                            <!-- array as values -->
                            @foreach ($category as $category1)
                                <option value="{{ $category1->id }}">{{ $category1->categoryname }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mt-3">
                        <label>Select Category</label>
                        <select name="subcategoryname" placeholder="select subCategory" class="form-control">
                            <option value="">-select subCategory-</option>
                            <!-- array as values -->
                            @foreach ($subcategory as $subcategory1)
                                <option value="{{ $subcategory1->id }}">{{ $subcategory1->subcategoryname }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group mt-3">
                        <input type="text" name="productname" placeholder="Enter productname" class="form-control">
                    </div>


                    <div class="form-group mt-3">
                        <input type="file" name="productimage" placeholder="Enter product image"
                            class="form-control">
                    </div>




                    <div class="form-group mt-3">
                        <input type="text" name="qty" placeholder="Enter Qty" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" name="oldprice" placeholder="Enter oldprice" class="form-control">
                    </div>


                    <div class="form-group mt-3">
                        <input type="text" name="offerprice" placeholder="Enter offerprice" class="form-control">
                    </div>




                    <div class="form-group mt-3">
                        <textarea name="descriptions" placeholder="Enter product descriptions" class="form-control"></textarea>
                    </div>


                    <div class="form-group mt-3">
                        <input type="submit" name="addbproduct" value="AddProducts"
                            class="btn btn-sm btn-primary bg-primary">

                        <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-danger bg-danger">
                    </div>

            </div>
        </div>
    </div>


</x-app-layout>
