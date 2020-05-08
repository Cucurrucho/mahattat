<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateContentRequest;
use Illuminate\Http\Request;

class ContentController extends Controller {
    public function show() {
        $aboutUs = app('content')->allStartingWith('about_us');
        $concepts = app('content')->allStartingWith('concepts');
        $groups = app('content')->allStartingWith('groups');
        $contact = app('content')->allStartingWith('contact');
        return view('admin.values', compact('aboutUs', 'concepts', 'groups', 'contact'));
    }

    public function update(UpdateContentRequest $request) {
        $request->commit();
        return back();
    }
}
