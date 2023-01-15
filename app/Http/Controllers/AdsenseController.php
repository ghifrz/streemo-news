<?php

namespace App\Http\Controllers;

use App\Models\Adsense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsenses = Adsense::all();
        
        return view('adsenses.index', compact('adsenses'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adsenses = Adsense::find($id);

        return view('adsenses.edit', compact('adsenses'));
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
        if (!empty($request->file('imageads'))) {
            $data = $request->all();
            $data['imageads'] = $request->file('imageads')->store('adsenses');

            $adsenses = Adsense::findOrFail($id);
            Storage::delete($adsenses->imageads);
            $adsenses->update($data);

            return redirect()->route('adsenses.index')->with('toast_info', 'Data has been Updated Successfully!');
        } else {
            $data = $request->all();

            $adsenses = Adsense::findOrFail($id);
            $adsenses->update($data);

            return redirect()->route('adsenses.index')->with('toast_info', 'Data has been Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
