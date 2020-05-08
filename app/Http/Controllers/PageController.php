<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller {

    public function index() {
        return view('site.home');
    }

    public function posts(Request $request) {
        $query = Post::query();
        $searchWord = $request->get('searchWord');
        if ($searchWord != '') {
            $query = $query->select('*', DB::raw("IF (`title` LIKE '%$searchWord%', 20,0)
          + IF (`summary` LIKE '%$searchWord%', 10,0) + IF (`summary` LIKE   '%$searchWord%', 5,0) AS 'weight'"))
                ->where('title', 'like', "%$searchWord%")
                ->orWhere('summary', 'like', "%$searchWord%")
                ->orWhere('body', 'like', "%$searchWord%")
                ->orderBy('weight', 'desc');
        }
        return $query->orderBy('created_at', 'desc')->paginate(5);
    }


    public function aboutUs() {
        $content = app('content')->get('about_us_' . app()->getLocale());
        return view('site.page', compact('content'));
    }

    public function contact() {
        $content = app('content')->get('contact_' . app()->getLocale());
        return view('site.page', compact('content'));
    }

    public function groups() {
        $content = app('content')->get('groups_' . app()->getLocale());

        return view('site.page', compact('content'));
    }

    public function concepts() {
        $content = app('content')->get('concepts_' . app()->getLocale());

        return view('site.page', compact('content'));
    }

    public function post(Post $post) {
        return view('site.post', compact('post'));
    }

    public function changeLocale($locale) {
        session(['appLocale' => $locale]);
        return redirect()->back();
    }

    public function tbd() {
        return view('site.tbd');
    }
}
