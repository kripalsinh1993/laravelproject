<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddBlogsModel;
use illuminate\Validation\Rules;
use DB;

class AddBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.addblogs');
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

            'blogstitle' => ['required'],
            'descriptions' => ['required']

        ]);
        //insert data in table

        date_default_timezone_set("Asia/Calcutta");
        $data = array(
            "blogstitle" => $request->blogstitle,
            "descriptions" => $request->descriptions

        );

        //elequent query builder using ORM(Object Relational Mapping model)
        AddBlogsModel::create($data);


        return redirect('/addblogs')->with('success', 'Blog Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = AddBlogsmodel::all();

        return view('admin.manageblog', ['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ed = AddBlogsModel::where('id', $id)->first();
        return view('admin.editblog', ['ed' => $ed]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $ed = array(
            'blogstitle' => $request->blogstitle,
            'descriptions' => $request->descriptions,
        );
        AddBlogsModel::where('id', $id)->update($ed);
        return redirect('/manageblog')->with('upd', 'Blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AddBlogsModel::where('id', $id)->delete();
        return redirect('/manageblog')->with('del', 'Your Blog Deleted Successfully');
    }
}