<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>


    <div class="container mt-5 bg-white p-4">
        <h2 class="mt-3 text-center" style="font-size:15px">Edit Your Gallery
        </h2>
        <hr class="border border-2 w-50 mx-auto">
        <div class="row">
            <div class="col-md-4 mt-5">
                <ul>
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
                        <div class="form-group mt-3">
                            <img src="{{ asset('uploads/gallery/' . $ed->galleryimage) }}" width="85px" height="75px"
                                class="card shadow-lg" alt="No image" width="85px" height="75px">
                            <input type="file" name="galleryimage" value="{{ $ed->galleryimage }}"
                                class="form-control shadow-lg">
                        </div>

                        <div class="form-group mt-3">
                            <textarea name="descriptions" placeholder="Enter Descriptions *" class="form-control shadow-lg">{{ $ed->descriptions }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="updategallery" value="Update Gallery"
                                class="btn btn-sm btn-primary bg-primary">
                            <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-danger bg-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





</x-app-layout>
