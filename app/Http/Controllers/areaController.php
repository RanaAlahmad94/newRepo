<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return Area::all();
             }
             catch(\Exception $ex)
             {
                 echo $ex->getMessage();
             }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('areas.add-area');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate(
            [
                'area_name'=>'required',
            ]
          );
          $fam=  Area::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


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
        //
    }
}
