<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddProductsModel;
use App\Models\CartModel;
use DB;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pid = DB::table('products')->select('id', 'productimage')->get();
        return view('Productdetails', ['pid' => $pid]);
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
        $data = array(
            'pid' => $request->pid,
            'descriptions' => $request->descriptions,
            'offerprice' => $request->offerprice,
            'qty' => $request->qty
        );

        CartModel::create($data);
        return redirect('/showcart')->with('success', 'product added to cart successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = DB::table('carts')->join('products', 'carts.pid', '=', 'products.id')->select('carts.*', 'products.productimage')->get();
        return view('showcart', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete from tablename where id='id';
        CartModel::where('id', $id)->delete();
        return redirect('/showcart')->with('del', 'Product Deleted Successfully');
    }
}