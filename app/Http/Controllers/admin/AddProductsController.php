<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AddProductsModel;
use Illuminate\Validation\Rules;
use DB;


class AddProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fetch category and subcategory in addproduct views
        $category = DB::table('categories')->select('id', 'categoryname')->get();

        $subcategory = DB::table('subcategories')->select('id', 'subcategoryname')->get();

        return view('addproducts', ['category' => $category, 'subcategory' => $subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryname' => ['required', 'string', 'max:255'],
            'subcategoryname' => ['required', 'string', 'max:255'],
            'productname' => ['required', 'string', 'max:255'],
            'productimage' => ['required', 'image'],
            'qty' => ['required'],
            'oldprice' => ['required'],
            'offerprice' => ['required'],
            'descriptions' => ['required'],

        ]);
        // uploads file or images
        $path = rand() . '.' . $request->productimage->extension();
        $request->productimage->move(public_path('uploads/products/'), $path);
        date_default_timezone_set("Asia/Calcutta");
        $data = array(
            "category_id" => $request->categoryname,
            "subcategory_id" => $request->subcategoryname,
            "productname" => $request->productname,
            "productimage" => $path,
            "qty" => $request->qty,
            "oldprice" => $request->oldprice,
            "offerprice" => $request->offerprice,
            "descriptions" => $request->descriptions
        );
        AddProductsModel::create($data);
        return redirect('/addproducts')->with('success', 'Your products Addedd successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')->select('products.*', 'categories.categoryname', 'subcategories.subcategoryname')->get();

        return view('admin.manageproducts', ['data' => $data]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //fetch data from product table
        $category = DB::table('categories')->select('id', 'categoryname')->get();
        $subcategory = DB::table('subcategories')->select('id', 'subcategoryname')->get();

        //edit from tablename where id='$id';
        $ed = AddProductsModel::where('id', $id)->first();
        return view('admin.editproducts', ['ed' => $ed, 'category' => $category, 'subcategory' => $subcategory]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $path = rand() . '.' . $request->productimage->extension();
        $request->productimage->move(public_path('uploads/products'), $path);

        $ed = array(
            'productimage' => $path,
            'productname' => $request->productname,
            'category_id' => $request->categoryname,
            'subcategory_id' => $request->subcategoryname,
            'descriptions' => $request->descriptions,
            'qty' => $request->qty,
            'oldprice' => $request->oldprice,
            'offerprice' => $request->offerprice,
        );
        AddProductsModel::where('id', $id)->update($ed);
        return redirect('/manageproducts')->with('upd', 'products updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AddProductsModel::where('id', $id)->delete();
        return redirect('/manageproducts')->with('del', 'Your Products Deleted Successfully');
    }
}