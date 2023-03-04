<?php

namespace App\Http\Controllers;


use App\Models\HomeModel;
use App\Models\AddProductsModel;
use App\Models\AddGalleriesModel;
use App\Models\AddBlogsModel;
use App\Models\ProductDetailsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('content');
    }

    public function show()
    {

        $products = AddProductsModel::all();
        return view(
            'shop',
            [
                'products' => $products
            ]
        );
    }

    public function gallery()
    {
        $gallary = AddGalleriesModel::all();
        return view(
            'gallery',
            [
                'gallery' => $gallary
            ]
        );
    }
    public function blog()
    {
        $blog = AddBlogsModel::all();
        return view(
            'blog',
            [
                'blog' => $blog
            ]
        );
    }

}