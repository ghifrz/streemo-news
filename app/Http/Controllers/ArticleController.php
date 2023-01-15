<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('articles.index', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('articles.create', compact('category'));
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
            'article_img' => 'required',

        ],
        [
            'title.min' => 'Minimum 4 Characters is required.'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request -> title);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['article_img'] = $request->file('article_img')->store('articles');

        Article::create($data);

        return redirect()->route('articles.index')->with('toast_success', 'Data has been Saved Successfully!');
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
        $article = Article::find($id);
        $category = Category::all();

        return view('articles.edit', compact(['article','category']));
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
        // $this->validate($request, [
        //     'title' => 'required|min:4',

        // ]);

        if(empty($request->file('article_img')))
        {
            $article = Article::find($id);
            $article -> update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            
            return redirect()->route('articles.index')->with('toast_info', 'Data has been Updated Successfully!');
    
        } else {
            $article = Article::find($id);
            Storage::delete($article->article_img);
            $article -> update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'article_img' => $request->file('article_img')->store('articles'),
            ]);

            return redirect()->route('articles.index')->with('toast_info', 'Data has been Updated Successfully!');
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
        $article = Article::find($id);
        Storage::delete('$article->article_img');
        $article->delete();

        return redirect()->route('articles.index')->with('toast_success', 'Data has been Deleted Successfully!');
    }
}
