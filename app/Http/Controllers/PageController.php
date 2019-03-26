<?php

namespace StartPage\Http\Controllers;

use StartPage\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::where('user_id', auth()->id())->get();

        return view('my-pages')->with(compact('pages'));
    }

    /**
     * Store a new page record in the database
     *
     * @param Request $request
     * @return void
    */
    public function store(Request $request)
    {
        $page = Page::create([
            'user_id' => auth()->id(),
            'slug' => Str::uuid(),
            'name' => request('name'),
            'theme' => request('theme')
        ]);

        return redirect('pages');
    }

    /**
     * Return the view for a page
     *
     * @param string $slug
     * @return void
     */
    public function show($slug)
    {
        // Create page based on page settings
        $page = Page::where('slug', $slug)->first();
        $theme = $page->theme;

        return view("themes/{$theme}");
    }

    public function create()
    {
        return view("create");
    }

    public function destroy($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $page->delete();
        
    }
}
