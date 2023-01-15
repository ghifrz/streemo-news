<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        
        return view('slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'slide_title' => 'required|min:4',

        ],
        [
            'slide_title.min' => 'Minimum 4 Characters is required.'
        ]);

        if (!empty($request->file('slide_img'))) 
        {
            $data = $request->all();
            $data['slide_img'] = $request->file('slide_img')->store('slides');

            Slide::create($data);

            return redirect()->route('slides.index')->with('toast_success', 'Data has been Saved Successfully!');
        } else {
            $data = $request->all();
            Slide::create($data);

            return redirect()->route('slides.index')->with('toast_succes', 'Data has been Saved Successfully!');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slides = Slide::find($id);
        if (!$slides) {
            return redirect()->back();
        }

        Storage::delete($slides->slide_img);
        $slides->delete();
        return redirect()->route('slides.index')->with('toast_success', 'Data has been Deleted Successfully!');
    }
}
