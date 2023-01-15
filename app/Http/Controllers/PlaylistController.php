<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlist = Playlist::all();
        return view('playlist.index', compact('playlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist.create');
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
            'playlist_title' => 'required|min:4',
            'description' => 'required',
            'playlist_img' => 'required',

        ],
        [
            'title.min' => 'Minimum 4 Characters is required.'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request -> playlist_title);
        $data['user_id'] = Auth::id();
        $data['playlist_img'] = $request->file('playlist_img')->store('playlist');

        Playlist::create($data);

        return redirect()->route('playlist.index')->with('toast_success', 'Data has been Saved Successfully!');
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
        $playlist = Playlist::find($id);

        return view('playlist.edit', compact('playlist'));
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
        if(empty($request->file('playlist_img')))
        {
            $playlist = Playlist::find($id);
            $playlist -> update([
                'playlist_title' => $request->playlist_title,
                'slug' => Str::slug($request->playlist_title),
                'description' => $request->description,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            
            return redirect()->route('articles.index')->with('toast_info', 'Data has been Updated Successfully!');
    
        } else {
            $playlist = Playlist::find($id);
            Storage::delete($playlist->playlist_img);
            $playlist -> update([
                'playlist_title' => $request->playlist_title,
                'slug' => Str::slug($request->playlist_title),
                'description' => $request->description,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'playlist_img' => $request->file('playlist_img')->store('playlist'),
            ]);

            return redirect()->route('playlist.index')->with('toast_info', 'Data has been Updated Successfully!');
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
        $playlist = Playlist::find($id);
        Storage::delete('$playlist->playlist_img');
        $playlist->delete();

        return redirect()->route('playlist.index')->with('toast_success', 'Data has been Deleted Successfully!');
    }
}
