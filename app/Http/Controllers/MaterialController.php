<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Materials::all();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::all();
        return view('materials.create', compact('playlist'));
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
            'title' => 'required|min:4',
            'description' => 'required',
            'image' => 'required',

        ],
        [
            'title.min' => 'Minimum 4 Characters is required.'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request -> title);
        $data['image'] = $request->file('image')->store('materials');

        Materials::create($data);

        return redirect()->route('materials.index')->with('toast_success', 'Data has been Saved Successfully!');
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
        $materials = Materials::find($id);
        $playlist = Playlist::all();
        
        return view('materials.edit', compact('materials','playlist'));
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
        $this->validate($request, 
        [
            'title' => 'required|min:4',

        ],
        [
            'title.min' => 'Minimum 4 Characters is required.'
        ]);

        if (!empty($request->file('image'))) 
        {
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            $data['image'] = $request->file('image')->store('materials');

            $materials = Materials::findOrFail($id);
            Storage::delete($materials->image);
            
            $materials->update($data);

            return redirect()->route('materials.index')->with('toast_info', 'Data has been Updated Successfully!');
        } else {
            $data = $request->all();
            $data['slug'] = Str::slug($request->title);

            $materials = Materials::findOrFail($id);
            $materials->update($data);

            return redirect()->route('materials.index')->with('toast_info', 'Data has been Updated Successfully!');
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
        $materials = Materials::find($id);
        Storage::delete('$materials->image');
        $materials->delete();

        return redirect()->route('materials.index')->with('toast_success', 'Data has been Deleted Successfully!');
    }
}
