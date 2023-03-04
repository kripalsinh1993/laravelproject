<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddGalleriesModel;
use illuminate\Validation\Rules;
use DB;

class AddGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.addgallery');
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
        //validation applied here


        $request->validate([

            'galleryimage' => ['required', 'image'],
            'descriptions' => ['required']

        ]);

        //insert data in table
        $path = rand() . '.' . $request->galleryimage->extension();
        $request->galleryimage->move(public_path('uploads/gallery/'), $path);
        date_default_timezone_set("Asia/Calcutta");

        $data = array(
            "galleryimage" => $path,
            "descriptions" => $request->descriptions

        );

        //elequent query builder using ORM(Object Relational Mapping model)
        AddGalleriesModel::create($data);


        return redirect('/addgallery')->with('success', 'Gallery Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = AddGalleriesmodel::all();

        return view('admin.managegallery', ['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ed = AddGalleriesModel::where('id', $id)->first();
        return view('admin.editgallery', ['ed' => $ed]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $path = rand() . '.' . $request->galleryimage->extension();
        $request->galleryimage->move(public_path('uploads/gallery'), $path);

        $ed = array(
            'galleryimage' => $path,
            'descriptions' => $request->descriptions,
        );
        AddGalleriesModel::where('id', $id)->update($ed);
        return redirect('/managegallery')->with('upd', 'gallery updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AddGalleriesModel::where('id', $id)->delete();
        return redirect('/managegallery')->with('del', 'Your Galllery Deleted Successfully');
    }
}