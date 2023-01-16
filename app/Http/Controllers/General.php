<?php

namespace App\Http\Controllers;

use App\Models\GeneralModel;
use Illuminate\Http\Request;

class General extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GeneralModel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        validator($request->all(), [
            'first_name' =>  ['required','max:50', 'string'],
            'last_name' =>  ['required','max:50', 'string'],
            'phone' => ['required','max:11', 'string'],
            'email' => ['required', 'email', 'unique:email'],
            'address'=> ['required','max:50', 'string'],
        ]);

        GeneralModel::create([
            'first_name' =>  $request->first_name,
            'last_name' =>   $request->last_name,
            'phone' =>  $request->phone,
            'email' =>  $request->email,
            'address'=>  $request->address,
        ]);
        return "Data saved successfully";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return GeneralModel::where('id', $id)->firstorFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        validator($request->all(), [
            'first_name' =>  ['required','max:50', 'string'],
            'last_name' =>  ['required','max:50', 'string'],
            'phone' => ['required','max:11', 'string'],
            'email' => ['required', 'email', 'unique:email'],
            'address'=> ['required','max:50', 'string'],
        ]);

        GeneralModel::where('id', $id)->update([
            'first_name' =>  $request->first_name,
            'last_name' =>   $request->last_name,
            'phone' =>  $request->phone,
            'email' =>  $request->email,
            'address'=>  $request->address,
        ]);
        return "Data updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GeneralModel::where('id', $id)->delete();
        return "Data deleted successfully";
    }
}
