<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function downloadFile()
    {
        return response()->download(public_path('img/IP2.png'), ' beautiful image ');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            //'title' => 'required',
            'image'=>'required|mimes:png,jpeg,jpg|max:10000',

        ]);

        $imageName = $request->image->getClientOriginalName();
        $request->image->move('img', $imageName);
        $photoURL = url('img'. '/'.$imageName);

        // $filee = new File;
        // $filee->title = $request->title;
        // $filee->image = $imageName;
        // $filee->save();
        
        return response()->json(['url'=> $photoURL ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
