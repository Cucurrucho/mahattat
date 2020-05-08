<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\CreatePostRequest;
use App\Http\Requests\Admin\Post\DeletePostRequest;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index() {
        return view('admin.post.index');
    }

    public function show(Post $post) {
        return view('admin.post.post', compact('post'));
    }

    public function showNew() {
        return view('admin.post.newPost');
    }

    public function update(StorePostRequest $request, Post $post) {
        $request->commit();
        return redirect()->back();
    }

    public function create(CreatePostRequest $request) {
        $post = $request->commit();
        return redirect()->action('Admin\PostController@show', $post);
    }

    public function delete(DeletePostRequest $request, Post $post) {
        $request->commit();
        return redirect()->back();
    }
}
