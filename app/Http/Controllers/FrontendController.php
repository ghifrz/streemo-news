<?php

namespace App\Http\Controllers;

use App\Models\Adsense;
use App\Models\Article;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::all();

        $article = Article::all();

        $slide = Slide::all();

        return view('layouts.homepage', 
        [
            'category' => $category,
            'article' => $article,
            'slide' => $slide,
        ]);
    }

    public function detail($slug)
    {
        $category = Category::all();

        $article = Article::where('slug', $slug)->first();

        $adsense = Adsense::where('id', '1')->first();

        $newPost = Article::orderBy('created_at', 'DESC')->limit('5')->get();

        return view('articles.show-details',
        [
            'article' => $article,
            'category' => $category,
            'adsense' => $adsense,
            'newPost' => $newPost,
        ]);
    }

    public function categories()
    {
        $category = Category::all();
        return view('articles.categories', compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) 
        {
            $category = Category::where('slug', $slug)->first();
            
            $article = Article::where('category_id',$category->id)->get();

            $adsense = Adsense::where('id', '1')->first();

            $newPost = Article::orderBy('created_at', 'DESC')->limit('5')->get();

            return view('articles.view-category', compact('category','article','adsense','newPost'));
        }
        else {
            return redirect('/homepage')->with('status',"Slug Doesn't Exists");
        }
        
    }
}
