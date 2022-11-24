<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 
use Yajra\Datatables\Facades\Datatables;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Record::all();
        return view('index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg',
          'name' => 'required',
          'email' => 'required|unique:records,email',
          'phone' => 'required|unique:records,phone',
          'country' => 'required',
          'state' => 'required',
          'city' => 'required',
          'address' => 'required',
        ]);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $img = time().'.'.$file->extension();
            $file->move(public_path().'/images/', $img);
        }

        $record = new Record;
        $record->name = $request->name;
        $record->email = $request->email;
        $record->phone = $request->phone;
        $record->country = $request->country;
        $record->state = $request->state;
        $record->city = $request->city;
        $record->address = $request->address;
        $record->image = $img;
        $record->save();

        return  response()->json([
            'message' => "Record Created Successfully .. !!",
            'success' => true
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        return view('update',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        if($request->hasfile('image')){
            $file = $request->file('image');
            $img = time().'.'.$file->extension();
            $file->move(public_path().'/images/', $img);
        }

        $record->name = !empty($request->name)?$request->name:$record->name;
        $record->email = !empty($request->email)?$request->email:$record->email;
        $record->phone = !empty($request->phone)?$request->phone:$record->phone;
        $record->country = !empty($request->country)?$request->country:$record->country;
        $record->state = !empty($request->state)?$request->state:$record->state;
        $record->city = !empty($request->city)?$request->city:$record->city;
        $record->address = !empty($request->address)?$request->address:$record->address;
        $record->image = !empty($request->hasfile('image'))?$img:$record->image;

        $record->update();

        return  response()->json([
            'message' => "Record Updated Successfully .. !!",
            'success' => true
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        $record->delete();

        return  response()->json([
            'message' => "Record Deleted Successfully .. !!",
            'success' => true
        ], Response::HTTP_OK);
    }
}
