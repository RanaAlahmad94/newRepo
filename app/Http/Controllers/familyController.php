<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\View\View;


class familyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::all();
        return view('families.showall',compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $areas=Area::all();
        return view('families.add-family',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator=$request->validate(
            [
                'full_name'=>'required',                
            ]
          );
          $fam=  Family::create($request->all());
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
